<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Fuji_service;
use App\Head_type;
use App\Customer;
use App\Part;
use App\Barcode;
use App\In_stock;
use App\In_stock_detail;
use App\Part_price_list;
use App\Fuji_service_detail;
use Auth;
use Session;

class StockController extends Controller
{

    public function thumbnail($id ,Request $request)
    {
        $in_stock_details = In_stock_detail::where('barcode', $id)->first();
        return view('admin.stock.thumbnail',
            ['in_stock_details'=>$in_stock_details]);

    }
    public function storeThumbnail(Request $request,$id){
        $this->validate($request, [

            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $data = $request->all();
        $in_stock_details = In_stock_detail::where('barcode', $id)->firstOrFail();
        $filePath = public_path('/uploads/product/');
        $fileName = $request->file('thumbnail')->getClientOriginalName();

        $img_name=substr($fileName,0,-4);

        if($in_stock_details->barcode==$img_name&&!(file_exists($filePath.$fileName))){
            $in_stock_details->thumbnail = $fileName;
            $request->file('thumbnail')->move($filePath, $fileName);
            $in_stock_details->save();
            Session::flash('success', 'Add thumbnail for '.$id.' is successfull !');
            return redirect('/admin/stock');
        }elseif ($in_stock_details->barcode==$img_name && file_exists($filePath.$fileName)){
            $in_stock_details->thumbnail = $fileName;
            $request->file('thumbnail')->move($filePath, $fileName);
            $in_stock_details->save();
            Session::flash('success', ' The thumbnail name of '.$id.' is overwriten successfully!');
            return redirect('/admin/stock');
        }
        else{
            Session::flash('sameName', '  The thumbnail name for '.$id.'is not same with barcode!  !');
            return redirect()->back();
        }


    }

    public function detail($id ,Request $request)
    {
        $in_stocks=In_stock::where('id', $id)->first();

        $in_stocks->save();

        $in_stock_details = In_stock_detail::where('in_stock_id', $id)->where('is_deleted', 0) ->get();
        return view('admin.stock.detail',
            ['in_stock_details'=>$in_stock_details,
                'in_stocks'=>$in_stocks]);
    }

    public function show(Request $request)
    {
        $limit = 5;
        $page = $request->get('page',1);
        $stt = ((int)$page-1)*$limit;

        $in_stock_details=In_stock_detail::select('in_stock_details.in_stock_id','in_stock_details.barcode','in_stock_details.part_id','in_stock_details.id',
            'in_stock_details.belongto','in_stock_details.quantity','in_stock_details.balance','in_stock_details.location','in_stock_details.thumbnail','in_stock_details.detail','in_stock_details.is_deleted'
        )
                         ->join('in_stocks','in_stock_details.in_stock_id','=','in_stocks.id')
                         ->join('part_price_lists','in_stock_details.part_id','=','part_price_lists.id')
                         ->where('in_stock_details.is_deleted', 0);

        if ($request->has('whetherBalance')){
            if(($request->whetherBalance)=='noBalance') {
                $in_stock_details->whereColumn('in_stock_details.quantity', '!=', 'in_stock_details.balance');
            }elseif(($request->whetherBalance)=='balance'){
                $in_stock_details->whereColumn('in_stock_details.quantity', '=', 'in_stock_details.balance');
            }else{

            }
        }


         if ($request->has('belongto')){
             if(($request->belongto)=='FOC') {

                 $in_stock_details->where('in_stock_details.belongto','=','WRR');
                 $in_stock_details->orwhere('in_stock_details.belongto','=','FOC');
                 $in_stock_details->orwhere('in_stock_details.belongto','=','ORD');
             }elseif (($request->belongto)=='LOAN'){
                 $in_stock_details->where('in_stock_details.belongto','=','1FMV');
                 $in_stock_details->orwhere('in_stock_details.belongto','=','1FMA');
                 $in_stock_details->orwhere('in_stock_details.belongto','=','1FMMC');
                 $in_stock_details->orwhere('in_stock_details.belongto','=','1HCM');
                 $in_stock_details->orwhere('in_stock_details.belongto','=','2FMV');
                 $in_stock_details->orwhere('in_stock_details.belongto','=','2FMA');
                 $in_stock_details->orwhere('in_stock_details.belongto','=','2FMMC');
                 $in_stock_details->orwhere('in_stock_details.belongto','=','2HCM');

             }
             else{
                 $in_stock_details->where('in_stock_details.belongto','=',$request->belongto);
             }
         }

        if ($request->fieldChoose=='part_id'){
            $in_stock_details->where('part_price_lists.id','like','%'.$request->keyword1.'%')
                ;}
        if ($request->fieldChoose=='name'){
            $in_stock_details->where('part_price_lists.name','like','%'.$request->keyword1.'%')
            ;}
         if ($request->fieldChoose=='location'){
                $in_stock_details->where('in_stock_details.location','like','%'.$request->keyword2.'%')
             ;} 
         if ($request->fieldChoose=='barcode'){
                $in_stock_details->where('in_stock_details.barcode','like','%'.$request->keyword1.'%')
             ;} 
         if ($request->fieldChoose=='inv_no'){
                $in_stock_details->where('in_stocks.inv_no','like','%'.$request->keyword2.'%')
             ;}      
         if ($request->fieldChoose=='po_no'){
                $in_stock_details->where('in_stocks.po_no','like','%'.$request->keyword2.'%')
             ;}


        $in_stock_details=$in_stock_details->orderBy('id', 'DESC')->paginate(5);
        return view('admin.stock.show',
            ['in_stock_details'=>$in_stock_details,
                'stt'=>$stt
                ]);
    }
    public function showAdvance(Request $request)
    {
        $limit = 5;
        $page = $request->get('page',1);
        $stt = ((int)$page-1)*$limit;

        $in_stock_details=In_stock_detail::select('in_stock_details.*')
            ->join('in_stocks','in_stock_details.in_stock_id','=','in_stocks.id')
            ->join('part_price_lists','in_stock_details.part_id','=','part_price_lists.id')
            ->where('in_stock_details.is_deleted', 0)->get();

        return view('admin.stock.show_advance',
            ['in_stock_details'=>$in_stock_details,
                'stt'=>$stt
            ]);
    }
    
    public function index(Request $request)
    {
        $in_stocks=In_stock::select('in_stocks.*')
                         ->join('users','in_stocks.user_id','=','users.id')
                          ->where('in_stocks.is_deleted',0)->get();
        /*$in_stocks->where('users.name','like','%'.$request->keyword.'%')
                        ->orwhere('in_stocks.inv_no','like','%'.$request->keyword.'%')
                        ->orwhere('in_stocks.inv_no','like','%'.$request->keyword.'%');*/
                        

        
        
        return view('admin.stock.index',
            ['in_stocks'=>$in_stocks,
                ]);
    }
    public function resetCart()
    {
        Cart::instance('createInstock')->destroy();


        return redirect('admin/instock/create');
    }

    public function create(Request $request)
    {

        $part_price_lists=Part_price_list::select('part_price_lists.*')
                        ->where('part_price_lists.id','like','%'.$request->keyword.'%')
                        ->orwhere('part_price_lists.name','like','%'.$request->keyword.'%')
                        ->orwhere('part_price_lists.rep_new','like','%'.$request->keyword.'%')                        
                        ->orwhere('part_price_lists.description','like','%'.$request->keyword.'%');
        $part_price_lists=$part_price_lists->orderBy('id', 'DESC')->paginate(5);
        return view('admin.stock.create',['part_price_lists'=>$part_price_lists]);
    }

    public function updateBarcode(Request $request, $id)
    {
        
        //lấy về số lượng còn lại trong kho của sản phẩm này
            $content = Cart::instance('createInstock')->content();
            foreach ($content as $item) {
                if ($id == $item->id) {
                    $rowId = $item->rowId;
                     Cart::instance('createInstock')->update($rowId, ['qty' => $request->qty,
                            'options'=>['number' => $request->number,
                                      'location' => $request->location,
                                      'belongto' => $request->belongto,
                                      'detail' => $request->detail
                                      ]]);
                    break;
                }
            }
        return redirect()->back();
    }

    public function updateEditInstock(Request $request, $id)
    {
        //lấy về số lượng còn lại trong kho của sản phẩm này
            $content = Cart::instance('editInstock')->content();
            foreach ($content as $item) {
                if ($id == $item->id) {
                    $rowId = $item->rowId;
                     Cart::instance('editInstock')->update($rowId, ['qty' => $request->qty,
                            'options'=>['number' => $request->number,
                            'location' => $request->location,
                            'belongto' => $request->belongto,
                             'detail' => $request->detail
                              ]]);
                     break;
                }
            }
        return redirect()->back();
    }


    public function instock($id)
    { 
        $array_tmp=array();
        $buy = Part_price_list::where('id', $id)->first();
        foreach(Cart::instance('createInstock')->content() as $item){
            array_push($array_tmp,$item->id);
        }
            $temp=$buy->id;

         if(in_array( $temp,$array_tmp,true)) {
                Session::flash('out_of_stock', 'You clicked over 1 time for one part. Please choose other part!');
            }else {
                   Cart::instance('createInstock')->add(array('id' => $buy->id,
                       'name' => $buy->name, 
                       'qty' => 1, 
                       'price' => $buy->price,
  'options' => array(  'number' => 1,
                       'belongto'=>$buy->belongto,
                       'location'=>$buy->location,
                       'detail'=>$buy->detail)));
            }    

     
        return redirect()->back();
    }
    public function editInstock($id)
{
    $array_tmp=array();
    $buy = Part_price_list::where('id', $id)->first();
    foreach(Cart::instance('editInstock')->content() as $item){
        array_push($array_tmp,$item->id);
    }
    $temp=$buy->id;

    if(in_array( $temp,$array_tmp,true)) {
        Session::flash('out_of_stock', 'You clicked over 1 time for one part. Please choose other part!');
    }else {
        Cart::instance('editInstock')->add(array('id' => $buy->id,
            'name' => $buy->name,
            'qty' => 1,
            'price' => $buy->price,
            'options' => array(  'number' => 1,
                'belongto'=>$buy->belongto,
                'location'=>$buy->location,
                'detail'=>$buy->detail)));
    }


    return redirect()->back();
}

    public function getInstock($id)
    {
        Cart::instance('editInstock')->destroy();
        $part_price_lists=Part_price_list::all();
        $in_stocks = In_stock::where('id', $id)->first();  
        $list = In_stock_detail::where('in_stock_id', $id)->where('is_deleted',0)->get();
        foreach ($list as $buy){
            Cart::instance('editInstock')->add(array('id' => $buy->part_id,
                          'name' => $buy->part_price_list->name, 
                          'qty' =>$buy->quantity, 
                          'price' => $buy->part_price_list->price,
'options' => array( 'description' => $buy->part_price_list->description,
                          'belongto'=>$buy->belongto,
                          'number' => $buy->number,
                          'barcode_delete' => $buy->barcode,
                          'location'=>$buy->location,
                           'detail'=>$buy->detail)));
        }
        return redirect('admin/instock/create/edit/'.$id);
    }


    public function deleteinstock($id)
    {
        $content = Cart::instance('createInstock')->content();
        foreach ($content as $item) {
            if ($id == $item->id) {
                $rowId = $item->rowId;
                Cart::instance('createInstock')->remove($rowId);
                break;
            }
        }

        return redirect('admin/instock/create');
    }

    public function delete($id)
    {
        $in_stocks=In_stock::findOrFail($id);

        $in_stocks->is_deleted=1;
        $in_stocks->save();
        $list1 = In_stock_detail::where('in_stock_id', $id)->get();
        foreach ($list1 as $data){
            $data->is_deleted=1;
            $data->save();
        }
        
        return redirect('admin/instock');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'inv_no' => 'required',
            'po_no' => 'required',
            'remark' =>'required|max:70'
            ],
            ['required' => ':attribute  is not blank',
                'required|max:30' => ':attribute  is over 30 charactor or not blank , ',
            ],
            ['inv_no' => 'Invoice  Number  ',
                'po_no' => 'Purchase Order Number ',
                'remark' => 'Remark ',
            ]);
        $is_ok=null;
        foreach (Cart::instance('createInstock')->content() as $sp){
            if ($sp->options->belongto==null||$sp->options->belongto==""||$sp->options->location==null||$sp->options->location==""){
                $is_ok=1;
            }
        }
        if($is_ok!=1){


            $array_tmp3 = array();
            $list3 = In_stock_detail::all()->pluck('barcode');
            foreach ($list3 as $data) {
                array_push($array_tmp3, $data);
            }
            if (count(Cart::instance('createInstock')->content()) > 0) {
                $ord = new In_stock();
                if (Auth::check()) {
                    $ord->user_id = Auth::user()->id;
                } else {
                    $ord->user_id = null;
                }
                $ord->inv_no = $request->inv_no;
                $ord->is_deleted = 0;
                $ord->po_no = $request->po_no;
                $ord->remark = $request->remark;
                $ord->in_date = date('Y-m-d');
                $ord->save();
                foreach (Cart::instance('createInstock')->content() as $sp) {
                    $ordDetail = new In_stock_detail();
                    $ordDetail->in_stock_id = $ord->id;
                    $ordDetail->part_id = $sp->id;
                    $str = date('Y-m-d');
                    $barcode_temp = $sp->options->belongto . "-" . $sp->id . "-" . $sp->options->location . "-" . $request->inv_no . "-" . $request->po_no . "-" . "$str[2]" . "$str[3]" . "$str[5]" . "$str[6]" . "$str[8]" . "$str[9]" . "-" . $sp->options->number;
                    $ordDetail->barcode = $barcode_temp;
                    $ordDetail->name = $sp->name;
                    $ordDetail->quantity = $sp->qty;
                    $ordDetail->balance = $sp->qty;
                    $ordDetail->location = $sp->options->location;
                    $ordDetail->belongto = $sp->options->belongto;
                    $ordDetail->number = $sp->options->number;
                    $ordDetail->detail = $sp->options->detail;
                    $ordDetail->is_deleted = 0;
                    $ordDetail->save();
                    if (in_array($barcode_temp, $array_tmp3, true)) {
                        Session::flash('success', 'Please check barcode. Barcode is only one!');
                        return redirect('/admin/instock/create');
                    } else {
                        $ordDetail->save();
                        $ord->save();
                    }
                }
                Cart::instance('createInstock')->destroy();
                Session::flash('success', 'Add new successfull!');
                return redirect('/admin/instock');

            }
        }else{
            Session::flash('success', 'Please fill into some field blanks!');
            return redirect('/admin/instock/create');
        }
        }
          


    public function edit($id ,Request $request)
    {
      
        $part_price_lists=Part_price_list::select('part_price_lists.*')
                        ->where('part_price_lists.id','like','%'.$request->keyword.'%')
                       ->orwhere('part_price_lists.name','like','%'.$request->keyword.'%')
                        ->orwhere('part_price_lists.rep_new','like','%'.$request->keyword.'%')                        
                         ->orwhere('part_price_lists.description','like','%'.$request->keyword.'%');
        $part_price_lists=$part_price_lists->orderBy('id', 'DESC')->paginate(5);
        $in_stocks = In_stock::where('id', $id)->first();
        $in_stocks->save();
        return view('admin.stock.edit',[
                 'part_price_lists'=>$part_price_lists,
                'in_stocks' => $in_stocks
                ]);
    }

    public function deleteinstockEdit($id)
    {
        $content = Cart::instance('editInstock')->content();
        foreach ($content as $item) {
            if ($id == $item->id) {
                $rowId = $item->rowId;
                $list1 = In_stock_detail::where('barcode', $item->options->barcode_delete)->get();
                foreach ($list1 as $data){
                    $data->is_deleted=1;
                    $data->save();
                }
                Cart::instance('editInstock')->remove($rowId);
                break;
            }
        }
        
        return redirect()->back();
    }

    public function update(Request $request, $id){


        $is_ok=null;
        foreach (Cart::instance('editInstock')->content() as $sp){
            if ($sp->options->belongto==null||$sp->options->belongto==""||$sp->options->location==null||$sp->options->location==""){
                $is_ok=1;
            }
        }
        if($is_ok!=1){

            //Begin:Lấy date của instock để lấy ký tự lưu vào barcode
         $_tmp = array();
        $in_stock = In_stock::where('id', $id)->get();
        foreach ($in_stock as $in_stock_details_tmp1){
                 array_push($_tmp,$in_stock_details_tmp1->in_date);
         }
         $str=$_tmp[0];
            //End:Lấy date của instock để lấy ký tự lưu vào barcode
        $in_stocks = In_stock::findOrFail($id);   
        if (Auth::check()) {
            $in_stocks->user_id = Auth::user()->id;
        } else {
            $in_stocks->user_id = null;
        }

        $in_stocks->remark =$request->remark;             
        $in_stocks->save(); 
        $in_stock_details = In_stock_detail::where('in_stock_id', $id)->get();  
        
        $array_tmp = array();
        //Begin: 2 vòng lặp: 1 $in_stock_details: lưu lần lượt từng bản ghi với 2 vòng data là in_stock_detail và Cart, 
                         // 2:  lấy để kiểm tra trường barcode tránh trường hợp lưu 2 lần 1 bản ghi có cùng barcode
        foreach($in_stock_details as $in_stock_details_tmpo){
            $in_stock_details = In_stock_detail::where('in_stock_id', $id)->get();
            // sau khi lưu new part thì lay lại part tu  database de tranh save lap lại 2 barcode
            foreach ($in_stock_details as $in_stock_details_tmp1){
                array_push($array_tmp,$in_stock_details_tmp1->barcode);
            }
            $in_stock_ = In_stock::where('id', $id)->first();
          foreach (Cart::instance('editInstock')->content() as $sp)
            {
                $barcode_temp=$sp->options->belongto."-".$sp->id."-".$sp->options->location."-".$in_stock_->inv_no."-" . $in_stock_->po_no . "-"."$str[2]"."$str[3]"."$str[5]"."$str[6]"."$str[8]"."$str[9]"."-".$sp->options->number;
                if(in_array($barcode_temp,$array_tmp,true)){ 
                    if(($in_stock_details_tmpo->barcode)==($barcode_temp)&&($in_stock_details_tmpo->part_id)==($sp->id)){
                    $in_stock_details_tmpo->quantity = $sp->qty;
                    $in_stock_details_tmpo->balance = $sp->qty;
                    $in_stock_details_tmpo->location = $sp->options->location;
                    $in_stock_details_tmpo->belongto = $sp->options->belongto;
                        $in_stock_details_tmpo->detail = $sp->options->detail;
                    $in_stock_details_tmpo->update();    
                   }      
                }else{
                    $list = new In_stock_detail();
                    $list->in_stock_id = $in_stocks->id;
                    $list->part_id = $sp->id;
                    $list->barcode = $barcode_temp; 
                    $list->name = $sp->name;       
                    $list->quantity = $sp->qty;
                    $list->balance = $sp->qty;
                    $list->number = $sp->options->number;
                    $list->location = $sp->options->location;
                    $list->belongto = $sp->options->belongto;
                    $list->detail = $sp->options->detail;
                    $list->is_deleted = 0;
                    if(in_array($barcode_temp,$array_tmp,true)){
                    Break;
                    }else{
                        $list->save();
                    }
                }
            }
         }
        Cart::instance('editInstock')->destroy();
        Session::flash('success', 'Edit successfull!');
        
        return redirect('/admin/instock');
        }else{
            Session::flash('success', 'Please fill into some field blanks!');
            return redirect()->back();
        }
        }
}
