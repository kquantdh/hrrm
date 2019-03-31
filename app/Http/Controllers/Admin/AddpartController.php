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
    public function resetCart()
    {
        Cart::instance('createFujiService')->destroy();

        return redirect('admin/fujiservice/create');
    }

    public function muahang($id)
    {
        $array_tmp=array();
        $buy = Part_price_list::where('id', $id)->first();
        foreach(Cart::instance('createFujiService')->content() as $item){
            array_push($array_tmp,$item->id);
        }
        $temp=$buy->id;
        if(in_array( $temp,$array_tmp,true)) {
            Session::flash('fail', 'You clicked over 1 time for one part. Please choose other part!');
        }else {
            cart::instance('createFujiService')->add(array('id' => $buy->id, 'name' => $buy->name, 'qty' => 1, 'price' => $buy->price,
                'options' => array( 'rep_new'=>$buy->rep_new)));
        }
        return redirect()->back();
    }
    public function editMuaHang($id)
    {
        $array_tmp=array();
        $buy = Part_price_list::where('id', $id)->first();
        foreach(Cart::instance('editFujiService')->content() as $item){
            array_push($array_tmp,$item->id);
        }
        $temp=$buy->id;
        if(in_array( $temp,$array_tmp,true)) {
            Session::flash('fail', 'You clicked over 1 time for one part. Please choose other part!');
        }else {
            cart::instance('editFujiService')->add(array('id' => $buy->id, 'name' => $buy->name, 'qty' => 1, 'price' => $buy->price,
                'options' => array('rep_new'=>$buy->rep_new)));
        }
        return redirect()->back();
    }


    public function getCart($id)
    {
        Cart::instance('editFujiService')->destroy();
        $fuji_service = Fuji_service::where('id', $id)->first();  
        $list = Fuji_service_detail::where('fuji_service_id', $id)->get();
        foreach ($list as $buy){
        cart::instance('editFujiService')->add(array('id' => $buy->part_id, 'name' => $buy->name, 'qty' => $buy->quantity, 'price' => $buy->price-($buy->discount*$buy->price)/100,
            'options' => array('rep_new'=>$buy->part_price_list->rep_new)));
        }
        return redirect('admin/fujiservice/create/edit/'.$id);
    }

    public function deleteorder($id)
    {
        $content = Cart::instance('createFujiService')->content();
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
        $content = Cart::instance('editFujiService')->content();
        foreach ($content as $item) {
            if ($id == $item->id) {
                $rowId = $item->rowId;
                Cart::remove($rowId);
                break;
            }
        }

        return redirect()->back();
    }
    public function deleteAllEdit($id)
    {

        $fuji_service = Fuji_service_detail::where('fuji_service_id', $id)->get();
        foreach ($fuji_service as $data){
            $data->delete();
        }
        Cart::instance('editFujiService')->destroy();
        return redirect()->back();
    }

    public function updateCart(Request $request, $id)
    {
         $content = Cart::instance('createFujiService')->content();
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

            $content = Cart::instance('editFujiService')->content();
            foreach ($content as $item) {
                if ($id == $item->id) {
                    $rowId = $item->rowId;
                     Cart::instance('editFujiService')->update($rowId, ['qty' => $request->qty]);
                    break;
                }
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
            'discount_part' => 'integer',
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
        $fuji_service->discount_part = $request->discount_part;
        $fuji_service->normal_hrs = $request->normal_hrs;
        $fuji_service->night_hrs = $request->night_hrs;
        $fuji_service->off_hrs = $request->off_hrs;
        $fuji_service->holiday_hrs = $request->holiday_hrs;
        $fuji_service->person_amount = $request->person_amount;
        $fuji_service->problem=$request->problem;
        $fuji_service->countermeasure=$request->countermeasure;               
        $fuji_service->save();
        $temp=Customer::where('id', $request->customer_id)->first();

        $chargeTransport=($request->entry*$temp->transport_price);
        $chargeNormal=($request->person_amount*(1-($request->discount/100))*($temp->normal_hrs*$request->normal_hrs));
        $chargeNight=($request->person_amount*(1-($request->discount/100))*($temp->night_hrs*$request->night_hrs));
        $chargeOff=($request->person_amount*(1-($request->discount/100))*($temp->off_hrs*$request->off_hrs));
        $chargeHoliday=($request->person_amount*(1-($request->discount/100))*($temp->holiday_hrs*$request->holiday_hrs));
        $fuji_service->service_amount = $chargeTransport+$chargeNormal+$chargeOff+$chargeNight+$chargeHoliday;

        $fuji_service->save();
        $amount=0;
        $list = Fuji_service_detail::where('fuji_service_id', $id)->first();
        if (!$list ){
            foreach (Cart::instance('editFujiService')->content() as $sp) {
                $ordDetail = new Fuji_service_detail();
                $ordDetail->fuji_service_id = $fuji_service->id;
                $ordDetail->part_id = $sp->id;
                $ordDetail->name = $sp->name;
                $ordDetail->price = $sp->price;
                $ordDetail->quantity = $sp->qty;
                $amount += ($sp->price * $sp->qty);
                $ordDetail->save();
            }
            $fuji_service->part_amount = $amount;
            $fuji_service->save();
            Session::flash('success', 'Edit successfull!');
            return redirect('/admin/fujiservice');
            $fuji_service->save();

        }else{
        $list1 = Fuji_service_detail::where('fuji_service_id', $id)->get();  
        $array_tmp = array();
        foreach($list1 as $data1){
            $list1 = Fuji_service_detail::where('fuji_service_id', $id)->get();
        foreach ($list1 as $data){
            array_push($array_tmp,$data->part_id);
        } 
          foreach (Cart::instance('editFujiService')->content() as $sp)
            {
                $value_data = $sp->id;
                if(in_array($value_data,$array_tmp,true)){ 
                    if(($data1->part_id)==($sp->id)){
                   $data1->price = $sp->price;
                    $data1->quantity = $sp->qty;
                    $data1->update();    
                   }        
                }else{
                    $list = new Fuji_service_detail();
                    $list->fuji_service_id = $fuji_service->id;
                    $list->part_id = $sp->id;
                    $list->name = $sp->name;
                    $list->quantity = $sp->qty;
                    $list->price = $sp->price;
                   $list->save();
                }
                $fuji_service->part_amount = Cart::instance('editFujiService')->subtotal(0, ".", ",");
                $fuji_service->save();
                
            }
         }
        Cart::destroy();
        
        Session::flash('success', 'Edit successfull!');
    
        return redirect('/admin/fujiservice');
        }
             
    
}
}
