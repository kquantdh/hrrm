<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Fuji_service;
use App\Head_type;
use App\Customer;
use App\In_stock;
use App\In_stock_detail;
use App\Out_stock;
use App\Out_stock_detail;
use App\Part_price_list;
use App\Fuji_service_detail;
use Auth;
use Session;
use PDF;

class OutStockController extends Controller
{
    private $_cust=[];

    public function __construct()
    {

        $customers=Customer::all();
        foreach ($customers as $customer){
            $this->_cust[$customer->id]=$customer->name;
        }
    }

        
    public function index(Request $request)
    {
        $limit = 10;
        $page = $request->get('page',1);
        $stt = ((int)$page-1)*$limit;
        $out_stocks=Out_stock::select('out_stocks.*')
                         ->join('users','out_stocks.user_id','=','users.id');
        $out_stocks->where('users.name','like','%'.$request->keyword.'%')
                        ->orwhere('out_stocks.out_no','like','%'.$request->keyword.'%')
                        ->orwhere('out_stocks.remark','like','%'.$request->keyword.'%');                        
                        
        $out_stocks=$out_stocks->orderBy('id', 'DESC')->paginate(10);
        
       
        return view('home.out_stock.show',
            ['out_stocks'=>$out_stocks,
                'stt'=>$stt
                ]);
    }
    public function change_status($id, Request $request)
    {

        $out_stocks = Out_stock::findOrFail($id);
        $status_old = $out_stocks->status;
        $out_stocks->status = $request->status;
        $out_stock_details = Out_stock_detail::where('out_stock_id', $id)->get();
        $is_ok=0;
        foreach ($out_stock_details as $item){
            $temp_ = In_stock_detail::where('barcode', $item->barcode)->first();
            if ($temp_->balance< $item->out_quantity){
                $is_ok=1;
            }
        }

        foreach ($out_stock_details as $item) {
            if ($out_stocks->status == 4 && $out_stocks->status != $status_old && $status_old!=5&&$is_ok==0) {

                $product = In_stock_detail::where('barcode', $item->barcode)->first();
                $out_stock_details = Out_stock_detail::where('barcode', $item->barcode)->where('out_stock_id',$out_stocks->id)->first();
                $product->balance = $product->balance - $item->out_quantity;
                $out_stock_details->status =$request->status;
                $out_stocks = Out_stock::findOrFail($id);
                if (Auth::check()) {
                    $out_stocks->user_id = Auth::user()->id;
                } else {
                    $out_stocks->user_id = null;
                }
                $out_stocks->status = $request->status;
                Session::flash('success', 'Changed to take out successfull!');
                $out_stocks->save();
                $product->save();
                $out_stock_details->save();

            }elseif($out_stocks->status == 5 && $status_old  ==4&& Auth::check() && Auth::user()->group_id==1 ){
                $product = In_stock_detail::where('barcode', $item->barcode)->first();
                $out_stock_details = Out_stock_detail::where('barcode', $item->barcode)->first();
                $product->balance = $product->balance + $item->out_quantity;
                $out_stock_details->status =$request->status;
                $out_stocks = Out_stock::findOrFail($id);
                if (Auth::check()) {
                    $out_stocks->return_user_id = Auth::user()->id;
                } else {
                    $out_stocks->return_user_id = null;
                }
                Session::flash('success', 'Changed to returned successfull!');
                $out_stocks->status = $request->status;
                $out_stocks->return_date = date('Y-m-d');
                $out_stocks->save();
                $product->save();
                $out_stock_details->save();
            }else{
                Session::flash('success', 'You can not change status. Please check quantity or status or access permission!');
            }
        }
        return redirect('home/outstock');
    }

    public function detail($id ,Request $request)
    {   
        $out_stock_details=Out_stock_detail::select('out_stock_details.*')
                                ->join('out_stocks','out_stock_details.out_stock_id','=','out_stocks.id');
                                $out_stock_details->where('out_stock_details.barcode',$id);
                                $out_stock_details->where('out_stock_details.status','4');
        $out_stock_details=$out_stock_details->orderBy('id', 'DESC')->paginate(10);


        
        return view('home.out_stock.detail',
            ['out_stock_details'=>$out_stock_details
            
                ]);
    }
    public function outAndReturnStockDetail($id ,Request $request)
    {
        $out_stocks=Out_stock::where('id', $id)->first();

        $out_stocks->save();

        $out_stock_details = Out_stock_detail::where('out_stock_id', $id)->get();
        return view('home.out_stock.outAndReturnStockDetail',
            ['out_stock_details'=>$out_stock_details,
                'out_stocks'=>$out_stocks

            ]);
    }
    public function resetCart()
    {
        Cart::instance('outstock')->destroy();

        return redirect('home/outstock/create');
    }
    public function create(Request $request)
    {
        $limit = 5;
        $page = $request->get('page',1);
        $stt = ((int)$page-1)*$limit;

        $in_stock_details=In_stock_detail::select('in_stock_details.*')
                         ->join('in_stocks','in_stock_details.in_stock_id','=','in_stocks.id')
                         ->join('part_price_lists','in_stock_details.part_id','=','part_price_lists.id');
        if ($request->fieldChoose=='part_id'){
            $in_stock_details->where('part_price_lists.id','like','%'.$request->keyword.'%')
                ;}
        if ($request->fieldChoose=='name'){
            $in_stock_details->where('part_price_lists.name','like','%'.$request->keyword.'%')
            ;}
        $in_stock_details=$in_stock_details->orderBy('id', 'DESC')->paginate(5);
        return view('home.out_stock.create',
            ['in_stock_details'=>$in_stock_details,
                'stt'=>$stt,
                'customers'=>$this->_cust,
                ]);
    }
    public function outstock($id)
    {
        $array_tmp=array();
        $buy = In_stock_detail::where('barcode', $id)->first();
        foreach(Cart::instance('outstock')->content() as $item){
            array_push($array_tmp,$item->id);
        }
            $temp=$buy->barcode;
        if ($buy->balance <= 0) {
            Session::flash('out_of_stock', 'Part: "' . $buy->barcode. '"  only have remainning stock is: ' . $buy->balance . ' pcs!');
        
        }elseif(in_array( $temp,$array_tmp,true)) {
            Session::flash('out_of_stock', 'You clicked over 1 time for one part. Please choose other part!');
        }else {
            Cart::instance('outstock')->add(array('id' => $buy->barcode,
            'name' => $buy->name, 
            'qty' => 1, 
            'price' => 1,
    'options' => array(  'part_no'=>$buy->part_id,
            'rep_new'=>$buy->rep_new,
            'belongto'=>$buy->belongto,
            'location'=>$buy->location)));
        }          
        return redirect()->back();
    }

    public function getOutstock($id)
    {
        Cart::instance('outstock')->destroy();
        $out_stocks = Out_stock::where('id', $id)->first();  
        $list = Out_stock_detail::where('out_stock_id', $id)->get();
        foreach ($list as $buy){
            Cart::instance('outstock')->add(array('id' => $buy->barcode, 'name' => $buy->in_stock_detail->name, 'qty' =>$buy->out_quantity, 'price' => 1,
            'options' => array('part_no'=>$buy->in_stock_detail->part_id,
            'rep_new'=>$buy->rep_new,
            'belongto'=>$buy->belongto,
            'location'=>$buy->location)));
        }
        return redirect('home/outstock/edit/'.$id);
    }

    public function deleteoutstock($id)
    {
        $content = Cart::instance('outstock')->content();
        foreach ($content as $item) {
            if ($id == $item->id) {
                $rowId = $item->rowId;
                Cart::instance('outstock')->remove($rowId);
                break;
            }
        }

        return redirect('home/outstock/create');
    }

    public function delete($id)
    {
        $out_stocks=Out_stock::findOrFail($id);
        $out_stocks->delete();
        $list1 = Out_stock_detail::where('out_stock_id', $id)->get();
        foreach ($list1 as $data){
            $data->delete();
        }
        return redirect('home/outstock');
    }

    public function deleteoutstockEdit($id)
    {
        $content = Cart::instance('outstock')->content();
        foreach ($content as $item) {
            if ($id == $item->id) {
                $rowId = $item->rowId;
                $list1 = Out_stock_detail::where('barcode', $item->id)->get();
                foreach ($list1 as $data){
                    $data->delete();
                }
                Cart::instance('outstock')->remove($rowId);
                break;
            }
        }
        return redirect()->back();
    }

    public function updateCart(Request $request, $id)
    {
        //lấy về số lượng còn lại trong kho của sản phẩm này
       
         
        $prd = In_stock_detail::where('barcode', $id)->first();
        if ($prd->balance > 0 && $prd->balance >= $request->qty) {
            $content = Cart::instance('outstock')->content();
            foreach ($content as $item) {
                if ($id == $item->id) {
                    $rowId = $item->rowId;
                     Cart::instance('outstock')->update($rowId, ['qty' => $request->qty]);
                    break;
                }
            }
        } else {
            Session::flash('out_of_stock', 'Part: "' . $prd->barcode. '"  only have remainning stock is: ' . $prd->balance . ' pcs!');
        }
    

        return redirect()->back();
    }
    public function updateEditOutstock(Request $request, $id)
    {
        //lấy về số lượng còn lại trong kho của sản phẩm này
            $content = Cart::instance('outstock')->content();
            foreach ($content as $item) {
                if ($id == $item->id) {
                    $rowId = $item->rowId;
                     Cart::instance('outstock')->update($rowId, ['qty' => $request->qty]);
                    break;
                }
            }
        
        

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'loan_date_no' => 'required|integer'
        ],
            [
                'required' => ':attribute  is not blank',
                'integer' => ':attribute must be integer number',
                'numeric' => ':attribute phải là số',
            ],

            [
                'loan_date_no' => 'Loan date amount ',
            ]);


            if (count(Cart::instance('outstock')->content()) > 0) {
                $ord = new Out_stock();
                if (Auth::check()) {
                    $ord->user_id = Auth::user()->id;
                } else {
                    $ord->user_id = null;
                }
                $ord->status=3;
                $ord->remark =$request->remark;
                $ord->out_date =  date('Y-m-d');
                $ord->customer_id =$request->customer_id;
                $ord->type_form =$request->type_form;
                $ord->loan_date_no =$request->loan_date_no;
                $ord->save();
                foreach (Cart::instance('outstock')->content() as $sp) {
                    $ordDetail = new Out_stock_detail();
                    $ordDetail->out_stock_id = $ord->id;
                    if (Auth::check()) {
                        $ordDetail->user_id = Auth::user()->id;
                    } else {
                        $ordDetail->user_id = null;
                    }
                    $ordDetail->barcode = $sp->id;
                    $ordDetail->out_quantity = $sp->qty;
                    $ordDetail->location = $sp->options->location;
                    $ordDetail->status =3;
                    $ordDetail->save();
                }
                $ord->save();
                Cart::instance('outstock')->destroy();
                Session::flash('success', 'Add new successfull!');
                return redirect('/home/outstock');
            }else{
                Session::flash('fail', 'You can\'t create new part out because part out don\'t have part!');
                return redirect()->back();
            }



    }

    public function edit($id ,Request $request)
    {
        $limit = 5;
        $page = $request->get('page',1);
        $stt = ((int)$page-1)*$limit;

        $in_stock_details=In_stock_detail::select('in_stock_details.*')
                         ->join('in_stocks','in_stock_details.in_stock_id','=','in_stocks.id')
                         ->join('part_price_lists','in_stock_details.part_id','=','part_price_lists.id');
                         $in_stock_details->where('in_stock_details.part_id','like','%'.$request->keyword.'%');
                         $in_stock_details->orwhere('in_stock_details.name','like','%'.$request->keyword.'%');
                         $in_stock_details->orwhere('in_stock_details.barcode','like','%'.$request->keyword.'%');
                         $in_stock_details->orwhere('in_stock_details.location','like','%'.$request->keyword.'%');
                         $in_stock_details->orwhere('in_stocks.inv_no','like','%'.$request->keyword.'%');
                         $in_stock_details->orwhere('in_stocks.po_no','like','%'.$request->keyword.'%');                 
        /*if ($request->fieldChoose=='location'){
            $in_stock_details->orwhere('in_stock_details.location','like','%'.$request->keyword.'%')
                ;}
        if ($request->fieldChoose=='invoice'){
            $in_stock_details->orwhere('in_stocks.invoice','like','%'.$request->keyword.'%')
            ;}
        if ($request->fieldChoose=='po'){
                $in_stock_details->orwhere('in_stocks.po','like','%'.$request->keyword.'%')
                ;}  */
        $in_stock_details=$in_stock_details->orderBy('id', 'DESC')->paginate(5);

        $out_stocks = Out_stock::where('id', $id)->first();
        $out_stocks->save();
        return view('home.out_stock.edit',
            ['in_stock_details'=>$in_stock_details,
            'out_stocks' => $out_stocks,
                'customers'=>$this->_cust,
                'stt'=>$stt
                ]);
    }

    public function update(Request $request, $id){

        /*$this->validate($request, [
            'inv_no' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'short_description' => 'required',
            'description' => 'required',
            'discount' => 'numeric'
        ],
            [
                'required' => ':attribute  is not blank',
                'integer' => ':attribute phải là số nguyên',
                'numeric' => ':attribute phải là số',
            ],

            [
                'sr_no' => 'Service Report No ',
                'price' => 'Giá ',
                'thumbnail' => 'Ảnh đại diện ',
                'quantity' => 'Số lượng ',
                'short_description' => 'Mô tả ngắn ',
                'description' => 'Mô tả chi tiết',
                'discount' => 'Giảm giá'
            ]);*/

        $out_stocks = Out_stock::findOrFail($id);
        if (Auth::check()) {
            $out_stocks->user_id = Auth::user()->id;
        } else {
            $out_stocks->user_id = null;
        }

        $out_stocks->customer_id =$request->customer_id;
        $out_stocks->type_form =$request->type_form;

        $out_stocks->remark =$request->remark;
        $out_stocks->loan_date_no =$request->loan_date_no;
        $out_stocks->save();
        $list1 = Out_stock_detail::where('out_stock_id', $id)->get();
        $array_tmp = array();
        foreach ($list1 as $data){
            array_push($array_tmp,$data->barcode);
        }
        foreach($list1 as $data1){
            $list1 = Out_stock_detail::where('out_stock_id', $id)->get();

            foreach (Cart::instance('outstock')->content() as $sp)
            {
                $value_data = $sp->id;
                if(in_array($value_data,$array_tmp,true)){
                    if(($data1->barcode)==($sp->id)){
                        if (Auth::check()) {
                            $data1->user_id = Auth::user()->id;
                        } else {
                            $data1->user_id = null;
                        }
                        $data1->barcode = $sp->id;
                        $data1->out_quantity = $sp->qty;
                        $data1->location = $sp->options->location;
                        $data1->update();
                    }
                }else{
                    $list = new Out_stock_detail();
                    $list->out_stock_id = $out_stocks->id;
                    if (Auth::check()) {
                        $list->user_id = Auth::user()->id;
                    } else {
                        $list->user_id = null;
                    }
                    $list->barcode = $sp->id;
                    $list->out_quantity = $sp->qty;
                    $list->location = $sp->options->location;
                    if(in_array($value_data,$array_tmp,true)){
                        Break;
                    }else{
                        $list->save();
                    }
                }
            }
        }
        Cart::instance('outstock')->destroy();
        Session::flash('success', 'Edit successfull!');
        return redirect('/home/outstock');
    }

    public function outStockPDF($id) 
    {
        $out_stock = Out_stock::where('id', $id)->first();
        $out_stock->save();
        $list=Out_stock_detail::where('out_stock_id', $id)->get();
        $pdf=PDF::loadView('home.out_stock.out_stock_pdf',
                          ['out_stock'=>$out_stock,
                                  'list' => $list]);
        return $pdf->download('outStockPDF.pdf');
    
    }
    /*public function outStockPDF($id) 
    {
        $out_stock = Out_stock::where('id', $id)->first();
        $out_stock->save();
        $list = Out_stock_detail::where('out_stock_id', $id)->get();
          
        return view('home.out_stock.out_stock_pdf',
            ['out_stock'=>$out_stock,'list' => $list
            
                ]);
    
    
    }*/


  



}
