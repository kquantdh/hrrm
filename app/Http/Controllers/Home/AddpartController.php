<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Fuji_service;
use App\Head_type;
use App\Customer;

use App\Part_price_list;
use App\Fuji_service_detail;
use Auth;
use Session;
class AddpartController extends Controller
{

    private $_cates=[];
    private $_cust=[];
    private $_quot=[];
    
    
    public function __construct()
    {
        
        $head_types = Head_type::all();
        $customers = Customer::all();
        
        foreach ($head_types as $head_type) {
            $this->_cates[$head_type->id] = $head_type->name;
        }
        foreach ($customers as $customer) {
            $this->_cust[$customer->id] = $customer->name;
        }
    }

    public function muahang($id)
    {
        $array_tmp=array();
        $buy = Part_price_list::where('id', $id)->first();
        foreach(Cart::instance('createFujiService')->content() as $item){
            array_push($array_tmp,$item->id);
        }
        cart::instance('createFujiService')->add(array('id' => $buy->id, 'name' => $buy->name, 'qty' => 1, 'price' => $buy->price,
            'options' => array( 'description' => $buy->description,'rep_new'=>$buy->rep_new)));
    
        $temp=$buy->id;
       if(in_array( $temp,$array_tmp,true)) {
            Session::flash('fail', 'You clicked over 1 time for one part. Please choose other part!');
        }else {
            cart::instance('createFujiService')->add(array('id' => $buy->id, 'name' => $buy->name, 'qty' => 1, 'price' => $buy->price,
                'options' => array( 'description' => $buy->description,'rep_new'=>$buy->rep_new)));
        }
        return redirect()->back();
    }




    public function getCart($id)
    {
        Cart::destroy();
        $flag=1;
        
        $fuji_service = Fuji_service::where('id', $id)->first();  
        $list = Fuji_service_detail::where('fuji_service_id', $id)->get();
        foreach ($list as $buy){
        cart::add(array('id' => $buy->part_id, 'name' => $buy->name, 'qty' => $buy->quantity, 'price' => $buy->price-($buy->discount*$buy->price)/100,
            'options' => array('description' => $buy->description,'rep_new'=>$buy->rep_new)));
        }
        return redirect()->back();
    }

    public function deleteorder($id)
    {
        $content = Cart::content();
        foreach ($content as $item) {
            if ($id == $item->id) {
                $rowId = $item->rowId;
                Cart::remove($rowId);
                break;
            }
        }

        return redirect('admin/fujiservice/create');
    }

    public function deleteorderEdit($id)
    {
        $content = Cart::content();
        foreach ($content as $item) {
            if ($id == $item->id) {
                $rowId = $item->rowId;
                Cart::remove($rowId);
                break;
            }
        }

        return redirect()->back();
    }

    public function updateCart(Request $request, $id)
    {
       

        
            $content = Cart::content();
            foreach ($content as $item) {
                if ($id == $item->id) {
                    $rowId = $item->rowId;
                    Cart::update($rowId, ['qty' => $request->qty]);
                    break;
                }
            
        } 
       
        return redirect('admin/fujiservice/create');
    }

    public function updateEditCart(Request $request, $id)
    {
        //lấy về số lượng còn lại trong kho của sản phẩm này
        $prd = Part_price_list::findOrFail($id);

        if ($prd->quantity > 0 && $prd->quantity >= $request->qty) {
            $content = Cart::content();
            foreach ($content as $item) {
                if ($id == $item->id) {
                    $rowId = $item->rowId;
                     Cart::update($rowId, ['qty' => $request->qty]);
                    break;
                }
            }
        } else {
            Session::flash('out_of_stock', 'Sản phẩm "' . $prd->name . '" trong kho còn số lượng là: ' . $prd->quantity . ' sản phẩm!');
        }

        return redirect()->back();
    }

    public function edit(Request $request,$id)
    {
        $part_price_lists=Part_price_list::select('part_price_lists.*')
        ->where('part_price_lists.id','like','%'.$request->keyword.'%')
        ->orwhere('part_price_lists.name','like','%'.$request->keyword.'%')
        ->orwhere('part_price_lists.rep_new','like','%'.$request->keyword.'%')                        
        ->orwhere('part_price_lists.description','like','%'.$request->keyword.'%');
        $part_price_lists=$part_price_lists->orderBy('id', 'DESC')->paginate(10);
        $fuji_service = Fuji_service::where('id', $id)->first();    
        $fuji_service->is_viewed=1;
        $fuji_service->save();        
        

        return view('admin.fuji_service.edit',[
                'head_types'=>$this->_cates,
                'part_price_lists'=>$part_price_lists,
                'fuji_service' => $fuji_service,
                'customers'=>$this->_cust ]
        );
    }

    public function update(Request $request, $id){


        $this->validate($request, [
            'entry' => 'integer',
            'discount' => 'integer',
            'normal_hrs' => 'numeric',
            'night_hrs' => 'numeric',
            'off_hrs' => 'numeric',
            'normal_hrs' => 'numeric',
            'holiday_hrs' => 'numeric',
        ],
            [
                'required' => ':Attribute  is not blank',
                'integer' => ':Attribute must be integer number',
                'numeric' => ':Attribute must be numeric',
            ],

            [

            ]);
        $fuji_service = Fuji_service::findOrFail($id); 
        $fuji_service->customer_id = $request->customer_id;
        $fuji_service->job_type = $request->job_type;
        $fuji_service->quotation = $request->quotation;
        $fuji_service->po = $request->po;
        $fuji_service->sr_no = $request->sr_no;
        $fuji_service->invoice = $request->invoice;
        $fuji_service->head_type_id = $request->head_type_id;
        $fuji_service->head_serial = $request->head_serial;
        $fuji_service->nature_service = $request->nature_service;
        $fuji_service->status = $request->status;
        $fuji_service->entry = $request->entry;
        $fuji_service->discount = $request->discount;
        $fuji_service->normal_hrs = $request->normal_hrs;
        $fuji_service->night_hrs = $request->night_hrs;
        $fuji_service->off_hrs = $request->off_hrs;
        $fuji_service->holiday_hrs = $request->holiday_hrs;
        $fuji_service->problem=$request->problem;
        $fuji_service->countermeasure=$request->countermeasure;               
        $fuji_service->save();
        $list1 = Fuji_service_detail::where('fuji_service_id', $id)->get();  
        $array_tmp = array();
        foreach($list1 as $data1){
            $list1 = Fuji_service_detail::where('fuji_service_id', $id)->get();
        foreach ($list1 as $data){
            array_push($array_tmp,$data->part_id);
        } 
          foreach (Cart::content() as $sp)
            {
                $value_data = $sp->id;
                if(in_array($value_data,$array_tmp,true)){ 
                    if(($data1->part_id)==($sp->id)){
                   $data1->price = $sp->price;
                    $data1->quantity = $sp->qty;
                    $data1->amount = $sp->price * $sp->qty;
                    $data1->update();    
                   }        
                }else{
                    $list = new Fuji_service_detail();
                    $list->fuji_service_id = $fuji_service->id;
                    $list->part_id = $sp->id;
                    $list->name = $sp->name;
                    
                    $list->vn_name = $sp->options->vn_name;
                    $list->location = $sp->options->location;
                    $list->quantity = $sp->qty;
                    $list->price = $sp->price;  
                    $list->amount = $sp->price * $sp->qty;
                   $list->save();
                   
                }
                
            }
         }
        Cart::destroy();
        
        Session::flash('success', 'Edit successfull!');
    
        return redirect('/admin/fujiservice');       
             
    
}
}
