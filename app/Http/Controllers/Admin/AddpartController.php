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
use App\Fuji_service_time_detail;
use Auth;
use Session;

class AddpartController extends Controller
{

    private $_cates = [];
    private $_cust = [];
    private $_quot = [];



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
        $array_tmp = array();
        $buy = Part_price_list::where('id', $id)->first();
        foreach (Cart::instance('createFujiService')->content() as $item) {
            array_push($array_tmp, $item->id);
        }
        $temp = $buy->id;
        if (in_array($temp, $array_tmp, true)) {
            Session::flash('fail', 'You clicked over 1 time for one part. Please choose other part!');
        } else {
            cart::instance('createFujiService')->add(array('id' => $buy->id, 'name' => $buy->name, 'qty' => 1, 'price' => $buy->price,
                'options' => array('rep_new' => $buy->rep_new,
                                   'vn_name' => $buy->vn_name,
                                   'material' => $buy->material,
                                   'import_tax' =>null,
                                   'additional_fee' => 0

                    )));
        }
        return redirect()->back();
    }

    public function editMuaHang($id)
    {
        $array_tmp = array();
        $buy = Part_price_list::where('id', $id)->first();
        foreach (Cart::instance('editFujiService')->content() as $item) {
            array_push($array_tmp, $item->id);
        }
        $temp = $buy->id;
        if (in_array($temp, $array_tmp, true)) {
            Session::flash('fail', 'You clicked over 1 time for one part. Please choose other part!');
        } else {
            cart::instance('editFujiService')->add(array('id' => $buy->id, 'name' => $buy->name, 'qty' => 1, 'price' => $buy->price,
                'options' => array('rep_new' => $buy->rep_new,
                                   'vn_name' => $buy->vn_name,
                                   'material' => $buy->material,
                                 'import_tax' => null,
                               'additional_fee' => 0
                )));
        }
        return redirect()->back();
    }

    public function editMuaHangCopy($id)
    {
        $array_tmp = array();
        $buy = Part_price_list::where('id', $id)->first();
        foreach (Cart::instance('editFujiServiceCopy')->content() as $item) {
            array_push($array_tmp, $item->id);
        }
        $temp = $buy->id;
        if (in_array($temp, $array_tmp, true)) {
            Session::flash('fail', 'You clicked over 1 time for one part. Please choose other part!');
        } else {
            cart::instance('editFujiServiceCopy')->add(array('id' => $buy->id, 'name' => $buy->name, 'qty' => 1, 'price' => $buy->price,
                'options' => array('rep_new' => $buy->rep_new,
                    'vn_name' => $buy->vn_name,
                    'material' => $buy->material,
                    'import_tax' =>null,
                    'additional_fee' => 0
                )));
        }
        return redirect()->back();
    }


    public function getCart($id)
    {
        Cart::instance('editFujiService')->destroy();
        $fuji_service = Fuji_service::where('id', $id)->first();
        $list = Fuji_service_detail::where('fuji_service_id', $id)->get();
        foreach ($list as $buy) {
            cart::instance('editFujiService')->add(array('id' => $buy->part_id, 'name' => $buy->name, 'qty' => $buy->quantity, 'price' => $buy->price - ($buy->discount * $buy->price) / 100,
                'options' => array('rep_new' => $buy->part_price_list->rep_new,
                    'vn_name' => $buy->part_price_list->vn_name,
                    'material' => $buy->part_price_list->material,
                    'import_tax' => $buy->import_tax,
                        'additional_fee' => $buy->additional_fee
                )));
        }
        return redirect('admin/fujiservice/create/edit/' . $id);
    }

    public function getCartCopy($id)
    {
        Cart::instance('editFujiServiceCopy')->destroy();
        $fuji_service = Fuji_service::where('id', $id)->first();
        $list = Fuji_service_detail::where('fuji_service_id', $id)->get();
        foreach ($list as $buy) {
            cart::instance('editFujiServiceCopy')->add(array('id' => $buy->part_id, 'name' => $buy->name, 'qty' => $buy->quantity, 'price' => $buy->price - ($buy->discount * $buy->price) / 100,
                'options' => array('rep_new' => $buy->part_price_list->rep_new,
                    'import_tax' => $buy->import_tax,
                        'additional_fee' => $buy->additional_fee
                )));
        }
        return redirect('admin/fujiservice/create/edit-copy/' . $id);
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

    public function deleteorderEditCopy($id)
    {
        $content = Cart::instance('editFujiServiceCopy')->content();
        foreach ($content as $item) {
            if ($id == $item->id) {
                $rowId = $item->rowId;
                Cart::remove($rowId);
                break;
            }
        }

        return redirect()->back();
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
        foreach ($fuji_service as $data) {
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
                Cart::update($rowId, ['qty' => $request->qty,
                               'options'=>['import_tax' => $request->import_tax,
                                   'rep_new' => $request->rep_new,
                                   'vn_name' => $request->vn_name,
                                   'material' => $request->material,
                                        'additional_fee' => $request->additional_fee]

                ]);
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
                Cart::instance('editFujiService')->update($rowId, ['qty' => $request->qty,
                    'options'=>['import_tax' => $request->import_tax,
                        'rep_new' => $request->rep_new,
                        'vn_name' => $request->vn_name,
                        'material' => $request->material,
                        'additional_fee' => $request->additional_fee]

                    ]);
                break;
            }
        }
        return redirect()->back();
    }

    public function updateEditCartCopy(Request $request, $id)
    {
        //lấy về số lượng còn lại trong kho của sản phẩm này

        $content = Cart::instance('editFujiServiceCopy')->content();
        foreach ($content as $item) {
            if ($id == $item->id) {
                $rowId = $item->rowId;
                Cart::instance('editFujiServiceCopy')->update($rowId, ['qty' => $request->qty,
                    'options'=>['import_tax' => $request->import_tax,
                        'additional_fee' => $request->additional_fee]
                ]);
                break;
            }
        }
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $part_price_lists = Part_price_list::select('part_price_lists.*')
            ->where('part_price_lists.id', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.name', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.rep_new', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.description', 'like', '%' . $request->keyword . '%');
        $part_price_lists = $part_price_lists->orderBy('id', 'DESC')->paginate(10);
        $fuji_service = Fuji_service::where('id', $id)->first();
        $fuji_service->is_viewed = 1;
        $fuji_service->save();
        $fuji_service_details = Fuji_service_detail::where('fuji_service_id', $id)->get();
        foreach ($fuji_service_details as $data) {
            $data->delete();
        }
        return view('admin.fuji_service.edit', [
                'head_types' => $this->_cates,
                'part_price_lists' => $part_price_lists,
                'fuji_service' => $fuji_service,
                'customers' => $this->_cust]
        );
    }

    public function editMoreService(Request $request, $id)
    {
        $part_price_lists = Part_price_list::select('part_price_lists.*')
            ->where('part_price_lists.id', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.name', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.rep_new', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.description', 'like', '%' . $request->keyword . '%');
        $part_price_lists = $part_price_lists->orderBy('id', 'DESC')->paginate(10);
        $fuji_service = Fuji_service::where('id', $id)->first();
        $fuji_service->is_viewed = 1;
        $fuji_service->save();
        $fuji_service_details = Fuji_service_detail::where('fuji_service_id', $id)->get();
        foreach ($fuji_service_details as $data) {
            $data->delete();
        }
        return view('admin.fuji_service.edit_more_service', [
                'date_time_sr_start'=>$fuji_service->fuji_service_time_detail->date_time_sr_start,
                'date_time_sr_end'=>$fuji_service->fuji_service_time_detail->date_time_sr_end,
                'date_time_1_from'=>$fuji_service->fuji_service_time_detail->date_time_1_from,
                'date_time_1_to'=>$fuji_service->fuji_service_time_detail->date_time_1_to,
                'date_time_2_from'=>$fuji_service->fuji_service_time_detail->date_time_2_from,
                'date_time_2_to'=>$fuji_service->fuji_service_time_detail->date_time_2_to,
                'date_time_3_from'=>$fuji_service->fuji_service_time_detail->date_time_3_from,
                'date_time_3_to'=>$fuji_service->fuji_service_time_detail->date_time_3_to,
                'date_time_4_from'=>$fuji_service->fuji_service_time_detail->date_time_4_from,
                'date_time_4_to'=>$fuji_service->fuji_service_time_detail->date_time_4_to,
                'date_time_5_from'=>$fuji_service->fuji_service_time_detail->date_time_5_from,
                'date_time_5_to'=>$fuji_service->fuji_service_time_detail->date_time_5_to,
                'date_time_6_from'=>$fuji_service->fuji_service_time_detail->date_time_6_from,
                'date_time_6_to'=>$fuji_service->fuji_service_time_detail->date_time_6_to,
                'date_time_7_from'=>$fuji_service->fuji_service_time_detail->date_time_7_from,
                'date_time_7_to'=>$fuji_service->fuji_service_time_detail->date_time_7_to,

                'head_types' => $this->_cates,
                'part_price_lists' => $part_price_lists,
                'fuji_service' => $fuji_service,
                'customers' => $this->_cust]
        );
    }

    public function editCopy(Request $request, $id)
    {
        $part_price_lists = Part_price_list::select('part_price_lists.*')
            ->where('part_price_lists.id', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.name', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.rep_new', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.description', 'like', '%' . $request->keyword . '%');
        $part_price_lists = $part_price_lists->orderBy('id', 'DESC')->paginate(10);
        $fuji_service = Fuji_service::where('id', $id)->first();
        $fuji_service->is_viewed = 1;
        $fuji_service->save();
        $fuji_service_details = Fuji_service_detail::where('fuji_service_id', $id)->get();
        foreach ($fuji_service_details as $data) {
            $data->delete();
        }
        return view('admin.fuji_service.edit_copy', [
                'head_types' => $this->_cates,
                'part_price_lists' => $part_price_lists,
                'fuji_service' => $fuji_service,
                'customers' => $this->_cust]
        );
    }

    public function editCopyMoreService(Request $request, $id)
    {
        $part_price_lists = Part_price_list::select('part_price_lists.*')
            ->where('part_price_lists.id', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.name', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.rep_new', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.description', 'like', '%' . $request->keyword . '%');
        $part_price_lists = $part_price_lists->orderBy('id', 'DESC')->paginate(10);
        $fuji_service = Fuji_service::where('id', $id)->first();
        $fuji_service->is_viewed = 1;
        $fuji_service->save();
        $fuji_service_details = Fuji_service_detail::where('fuji_service_id', $id)->get();
        foreach ($fuji_service_details as $data) {
            $data->delete();
        }


        return view('admin.fuji_service.edit_copy_more_service', [
                'date_time_sr_start'=>$fuji_service->fuji_service_time_detail->date_time_sr_start,
                'date_time_sr_end'=>$fuji_service->fuji_service_time_detail->date_time_sr_end,
                'date_time_1_from'=>$fuji_service->fuji_service_time_detail->date_time_1_from,
                'date_time_1_to'=>$fuji_service->fuji_service_time_detail->date_time_1_to,
                'date_time_2_from'=>$fuji_service->fuji_service_time_detail->date_time_2_from,
                'date_time_2_to'=>$fuji_service->fuji_service_time_detail->date_time_2_to,
                'date_time_3_from'=>$fuji_service->fuji_service_time_detail->date_time_3_from,
                'date_time_3_to'=>$fuji_service->fuji_service_time_detail->date_time_3_to,
                'date_time_4_from'=>$fuji_service->fuji_service_time_detail->date_time_4_from,
                'date_time_4_to'=>$fuji_service->fuji_service_time_detail->date_time_4_to,
                'date_time_5_from'=>$fuji_service->fuji_service_time_detail->date_time_5_from,
                'date_time_5_to'=>$fuji_service->fuji_service_time_detail->date_time_5_to,
                'date_time_6_from'=>$fuji_service->fuji_service_time_detail->date_time_6_from,
                'date_time_6_to'=>$fuji_service->fuji_service_time_detail->date_time_6_to,
                'date_time_7_from'=>$fuji_service->fuji_service_time_detail->date_time_7_from,
                'date_time_7_to'=>$fuji_service->fuji_service_time_detail->date_time_7_to,
                'head_types' => $this->_cates,
                'part_price_lists' => $part_price_lists,
                'fuji_service' => $fuji_service,
                'customers' => $this->_cust]
        );
    }



    public function update(Request $request, $id)
    {

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
        $y=new Fuji_service_detail();
        $fuji_service = Fuji_service::findOrFail($id);
        $fuji_service->update($request->all());
        $temp = Customer::where('id', $request->customer_id)->first();
        $temp_head_type = Head_type::where('id', $request->head_type_id)->first();
        //service fee
        $chargeTransport = ($request->entry * $temp->transport_price);
        $chargeNormal = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->normal_hrs * $request->normal_hrs));
        $chargeNight = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->night_hrs * $request->night_hrs));
        $chargeOff = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->off_hrs * $request->off_hrs));
        $chargeHoliday = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->holiday_hrs * $request->holiday_hrs));
        $fuji_service->service_amount = $chargeTransport + $chargeNormal + $chargeOff + $chargeNight + $chargeHoliday;
        if($request->job_type==4){
            $fuji_service->transport_head_price=$temp->transport_price*$request->transfer_head_time;// số lần giao nhận head
            $fuji_service->head_charge=$temp_head_type->price;
        }
        $fuji_service->save();
        $amount_jpy = 0;//Tính báo giá part ra yên
        $amount_usd=0;//Tính báo giá part ra USd
        $amount=0;// Tính báo giá part ra VND
        $addition_fee_amount=0;
        $list = Fuji_service_detail::where('fuji_service_id', $id)->first();
        $serviceTime1 = Fuji_service_time_detail::where('fuji_service_id', $id)->first();
        if(!$serviceTime1) {
            $serviceTime = new Fuji_service_time_detail();
            $serviceTime->fuji_service_id = $fuji_service->id;
            $serviceTime->date_time_sr_start=isset($request->date_time_sr_start)? $request->date_time_sr_start:null;
            $serviceTime->date_time_sr_end=isset($request->date_time_sr_end)? $request->date_time_sr_end:null;
            $serviceTime->date_time_1_from=isset($request->date_time_1_from)? $request->date_time_1_from:null;
            $serviceTime->date_time_1_to=isset($request->date_time_1_to)? $request->date_time_1_to:null;
            $serviceTime->date_time_2_from=isset($request->date_time_2_from)? $request->date_time_2_from:null;
            $serviceTime->date_time_2_to=isset($request->date_time_2_to)? $request->date_time_2_to:null;
            $serviceTime->date_time_3_from=isset($request->date_time_3_from)? $request->date_time_3_from:null;
            $serviceTime->date_time_3_to=isset($request->date_time_3_to)? $request->date_time_3_to:null;
            $serviceTime->date_time_4_from=isset($request->date_time_4_from)? $request->date_time_4_from:null;
            $serviceTime->date_time_4_to=isset($request->date_time_4_to)? $request->date_time_4_to:null;
            $serviceTime->date_time_5_from=isset($request->date_time_5_from)? $request->date_time_5_from:null;
            $serviceTime->date_time_5_to=isset($request->date_time_5_to)? $request->date_time_5_to:null;
            $serviceTime->date_time_6_from=isset($request->date_time_6_from)? $request->date_time_6_from:null;
            $serviceTime->date_time_6_to=isset($request->date_time_6_to)? $request->date_time_6_to:null;
            $serviceTime->date_time_7_from=isset($request->date_time_7_from)? $request->date_time_7_from:null;
            $serviceTime->date_time_7_to=isset($request->date_time_7_to)? $request->date_time_7_to:null;
            $serviceTime->save();

        }else{
            $serviceTime = Fuji_service_time_detail::where('fuji_service_id', $id)->first();
            $serviceTime->date_time_sr_start=isset($request->date_time_sr_start)? $request->date_time_sr_start:null;
            $serviceTime->date_time_sr_end=isset($request->date_time_sr_end)? $request->date_time_sr_end:null;
            $serviceTime->date_time_1_from=isset($request->date_time_1_from)? $request->date_time_1_from:null;
            $serviceTime->date_time_1_to=isset($request->date_time_1_to)? $request->date_time_1_to:null;
            $serviceTime->date_time_2_from=isset($request->date_time_2_from)? $request->date_time_2_from:null;
            $serviceTime->date_time_2_to=isset($request->date_time_2_to)? $request->date_time_2_to:null;
            $serviceTime->date_time_3_from=isset($request->date_time_3_from)? $request->date_time_3_from:null;
            $serviceTime->date_time_3_to=isset($request->date_time_3_to)? $request->date_time_3_to:null;
            $serviceTime->date_time_4_from=isset($request->date_time_4_from)? $request->date_time_4_from:null;
            $serviceTime->date_time_4_to=isset($request->date_time_4_to)? $request->date_time_4_to:null;
            $serviceTime->date_time_5_from=isset($request->date_time_5_from)? $request->date_time_5_from:null;
            $serviceTime->date_time_5_to=isset($request->date_time_5_to)? $request->date_time_5_to:null;
            $serviceTime->date_time_6_from=isset($request->date_time_6_from)? $request->date_time_6_from:null;
            $serviceTime->date_time_6_to=isset($request->date_time_6_to)? $request->date_time_6_to:null;
            $serviceTime->date_time_7_from=isset($request->date_time_7_from)? $request->date_time_7_from:null;
            $serviceTime->date_time_7_to=isset($request->date_time_7_to)? $request->date_time_7_to:null;
            $serviceTime->save();


        }
        if (!$list) {
            foreach (Cart::instance('editFujiService')->content() as $sp) {
                $ordDetail = new Fuji_service_detail();
                $ordDetail->fuji_service_id = $fuji_service->id;
                $ordDetail->part_id = $sp->id;
                $ordDetail->name = $sp->name;
                $ordDetail->price = $sp->price;
                $ordDetail->quantity = $sp->qty;
                $ordDetail->import_tax = $sp->options->import_tax;
                $ordDetail->additional_fee = $sp->options->additional_fee;
                $ordDetail->save();

                $amount_jpy +=$y->roundUpToNearestHundred($sp->price*$sp->qty*$temp->jpy_rate) * (1.1+$sp->options->import_tax/100+$sp->options->import_tax/1000);

                $amount_usd +=$y->roundUpToNearest($sp->price*$sp->qty*$temp->usd_rate) * (1.1+$sp->options->import_tax/100+$sp->options->import_tax/1000);

                $amount +=isset($temp->jpy_rate)? $y->roundUpToNearestThousand($sp->price*$sp->qty*$temp->jpy_rate*$temp->jpy_vnd_rate) * (1.1+$sp->options->import_tax/100+$sp->options->import_tax/1000):
                    $y->roundUpToNearestThousand($sp->price*$sp->qty*$temp->usd_rate*$temp->usd_vnd_rate) * (1.1+$sp->options->import_tax/100+$sp->options->import_tax/1000);

                $addition_fee_amount+=$sp->options->additional_fee;
                // $amount= price*quantity*jpy_rate*j($sp->price*$sp->qty*$temp->jpy_rate*$temp->jpy_vnd_rate,-3) * (1.1+$sp->options->import_tax/100+$sp->options->import_tax/1000)+$sp->options->additional_fee;
                // $amount= price*quantity*jpy_rate*jpy_vnd_rate+ price*quantity*jpy_rate*jpy_vnd_rate*import_tax
                // +(price*quantity*jpy_rate*jpy_vnd_rate+price*quantity*jpy_rate*jpy_vnd_rate*import_tax)*VAT(10%)
                // +additional_fee

            }
            if($request->job_type==5||$request->job_type==6||$request->job_type==7||$request->job_type==8){
                $fuji_service->part_amount_jpy =0;
                $fuji_service->part_amount_usd= 0;
                $fuji_service->part_amount = 0;
                $fuji_service->addition_fee_amount=0;
                $fuji_service->save();

            }else{
                $fuji_service->part_amount_jpy = $y->roundUpToNearestHundred($amount_jpy*(1 - ($request->discount_part / 100)));
                $fuji_service->part_amount_usd= $y->roundUpToNearest($amount_usd*(1 - ($request->discount_part / 100)));
                $fuji_service->part_amount = $y->roundUpToNearestTenThousand($amount*(1 - ($request->discount_part / 100)));
                $fuji_service->addition_fee_amount=$y->roundUpToNearestTenThousand($addition_fee_amount);
                $fuji_service->save();
            }
            $fuji_service->save();
            Session::flash('success', 'Edit successfull!');
            return redirect('/admin/fujiservice');


        } else {
            $amount = 0;
            $list1 = Fuji_service_detail::where('fuji_service_id', $id)->get();
            $array_tmp = array();
            foreach ($list1 as $data1) {
                $list1 = Fuji_service_detail::where('fuji_service_id', $id)->get();
                foreach ($list1 as $data) {
                    array_push($array_tmp, $data->part_id);
                }

                foreach (Cart::instance('editFujiService')->content() as $sp)
                {
                    $value_data = $sp->id;

                    if (in_array($value_data, $array_tmp, true)) {
                        if (($data1->part_id) == ($sp->id)) {
                            $data1->price = $sp->price;
                            $data1->import_tax = $sp->options->import_tax;
                            $data1->additional_fee = $sp->options->additional_fee;
                            $data1->quantity = $sp->qty;
                            $data1->update();
                            $y=new Fuji_service_detail();
                            $amount_jpy +=$y->roundUpToNearestHundred($sp->price*$sp->qty*$temp->jpy_rate) * (1.1+$sp->options->import_tax/100+$sp->options->import_tax/1000);

                            $amount_usd +=$y->roundUpToNearest($sp->price*$sp->qty*$temp->usd_rate) * (1.1+$sp->options->import_tax/100+$sp->options->import_tax/1000);

                            $amount +=isset($temp->jpy_rate)? $y->roundUpToNearestThousand($sp->price*$sp->qty*$temp->jpy_rate*$temp->jpy_vnd_rate) * (1.1+$sp->options->import_tax/100+$sp->options->import_tax/1000):
                                $y->roundUpToNearestThousand($sp->price*$sp->qty*$temp->usd_rate*$temp->usd_vnd_rate) * (1.1+$sp->options->import_tax/100+$sp->options->import_tax/1000);

                            $addition_fee_amount+=$sp->options->additional_fee;
                            // $amount= price*quantity*jpy_rate*j($sp->price*$sp->qty*$temp->jpy_rate*$temp->jpy_vnd_rate,-3) * (1.1+$sp->options->import_tax/100+$sp->options->import_tax/1000)+$sp->options->additional_fee;
                            // $amount= price*quantity*jpy_rate*jpy_vnd_rate+ price*quantity*jpy_rate*jpy_vnd_rate*import_tax
                            // +(price*quantity*jpy_rate*jpy_vnd_rate+price*quantity*jpy_rate*jpy_vnd_rate*import_tax)*VAT(10%)
                            // +additional_fee



                        }
                    } else {
                        $list = new Fuji_service_detail();
                        $list->fuji_service_id = $fuji_service->id;
                        $list->part_id = $sp->id;
                        $list->name = $sp->name;
                        $list->quantity = $sp->qty;
                        $list->price = $sp->price;
                        $list->import_tax = $sp->options->import_tax;
                        $list->additional_fee = $sp->options->additional_fee;
                        $amount_jpy +=$y->roundUpToNearestHundred($sp->price*$sp->qty*$temp->jpy_rate) * (1.1+$sp->options->import_tax/100+$sp->options->import_tax/1000);

                        $amount_usd +=$y->roundUpToNearest($sp->price*$sp->qty*$temp->usd_rate) * (1.1+$sp->options->import_tax/100+$sp->options->import_tax/1000);

                        $amount +=isset($temp->jpy_rate)? $y->roundUpToNearestThousand($sp->price*$sp->qty*$temp->jpy_rate*$temp->jpy_vnd_rate) * (1.1+$sp->options->import_tax/100+$sp->options->import_tax/1000):
                            $y->roundUpToNearestThousand($sp->price*$sp->qty*$temp->usd_rate*$temp->usd_vnd_rate) * (1.1+$sp->options->import_tax/100+$sp->options->import_tax/1000);

                        $addition_fee_amount+=$sp->options->additional_fee;
                        // $amount= price*quantity*jpy_rate*j($sp->price*$sp->qty*$temp->jpy_rate*$temp->jpy_vnd_rate,-3) * (1.1+$sp->options->import_tax/100+$sp->options->import_tax/1000)+$sp->options->additional_fee;
                        // $amount= price*quantity*jpy_rate*jpy_vnd_rate+ price*quantity*jpy_rate*jpy_vnd_rate*import_tax
                        // +(price*quantity*jpy_rate*jpy_vnd_rate+price*quantity*jpy_rate*jpy_vnd_rate*import_tax)*VAT(10%)
                        // +additional_fee
                        $list->save();
                    }


                }
            }
            if($request->job_type==5||$request->job_type==6||$request->job_type==7||$request->job_type==8){
                $fuji_service->part_amount_jpy =0;
                $fuji_service->part_amount_usd= 0;
                $fuji_service->part_amount = 0;
                $fuji_service->addition_fee_amount=0;
                $fuji_service->save();

            }else{
                $fuji_service->part_amount_jpy = $y->roundUpToNearestHundred($amount_jpy*(1 - ($request->discount_part / 100)));
                $fuji_service->part_amount_usd= $y->roundUpToNearest($amount_usd*(1 - ($request->discount_part / 100)));
                $fuji_service->part_amount = $y->roundUpToNearestTenThousand($amount*(1 - ($request->discount_part / 100)));
                $fuji_service->addition_fee_amount=$y->roundUpToNearestTenThousand($addition_fee_amount);
                $fuji_service->save();
            }


            Cart::instance('editFujiService')->destroy();

            Session::flash('success', 'Edit successfull!');

            return redirect('/admin/fujiservice');
        }
    }




    public function updateMoreService(Request $request, $id)
    {

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
        $fuji_service->update($request->all());
        $temp = Customer::where('id', $request->customer_id)->first();
        $chargeTransport = ($request->entry * $temp->transport_price);
        $chargeNormal = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->normal_hrs * $request->normal_hrs));
        $chargeNight = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->night_hrs * $request->night_hrs));
        $chargeOff = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->off_hrs * $request->off_hrs));
        $chargeHoliday = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->holiday_hrs * $request->holiday_hrs));
        $fuji_service->service_amount = $chargeTransport + $chargeNormal + $chargeOff + $chargeNight + $chargeHoliday;

        $fuji_service->save();
        $amount = 0;
        $list = Fuji_service_detail::where('fuji_service_id', $id)->first();
        $serviceTime1 = Fuji_service_time_detail::where('fuji_service_id', $id)->first();
        if(!$serviceTime1) {
            $serviceTime = new Fuji_service_time_detail();
            $serviceTime->fuji_service_id = $fuji_service->id;
            $serviceTime->date_time_sr_start=isset($request->date_time_sr_start)? $request->date_time_sr_start:null;
            $serviceTime->date_time_sr_end=isset($request->date_time_sr_end)? $request->date_time_sr_end:null;
            $serviceTime->date_time_1_from=isset($request->date_time_1_from)? $request->date_time_1_from:null;
            $serviceTime->date_time_1_to=isset($request->date_time_1_to)? $request->date_time_1_to:null;
            $serviceTime->date_time_2_from=isset($request->date_time_2_from)? $request->date_time_2_from:null;
            $serviceTime->date_time_2_to=isset($request->date_time_2_to)? $request->date_time_2_to:null;
            $serviceTime->date_time_3_from=isset($request->date_time_3_from)? $request->date_time_3_from:null;
            $serviceTime->date_time_3_to=isset($request->date_time_3_to)? $request->date_time_3_to:null;
            $serviceTime->date_time_4_from=isset($request->date_time_4_from)? $request->date_time_4_from:null;
            $serviceTime->date_time_4_to=isset($request->date_time_4_to)? $request->date_time_4_to:null;
            $serviceTime->date_time_5_from=isset($request->date_time_5_from)? $request->date_time_5_from:null;
            $serviceTime->date_time_5_to=isset($request->date_time_5_to)? $request->date_time_5_to:null;
            $serviceTime->date_time_6_from=isset($request->date_time_6_from)? $request->date_time_6_from:null;
            $serviceTime->date_time_6_to=isset($request->date_time_6_to)? $request->date_time_6_to:null;
            $serviceTime->date_time_7_from=isset($request->date_time_7_from)? $request->date_time_7_from:null;
            $serviceTime->date_time_7_to=isset($request->date_time_7_to)? $request->date_time_7_to:null;
            $serviceTime->save();

        }else{
            $serviceTime = Fuji_service_time_detail::where('fuji_service_id', $id)->first();
            $serviceTime->date_time_sr_start=isset($request->date_time_sr_start)? $request->date_time_sr_start:null;
            $serviceTime->date_time_sr_end=isset($request->date_time_sr_end)? $request->date_time_sr_end:null;
            $serviceTime->date_time_1_from=isset($request->date_time_1_from)? $request->date_time_1_from:null;
            $serviceTime->date_time_1_to=isset($request->date_time_1_to)? $request->date_time_1_to:null;
            $serviceTime->date_time_2_from=isset($request->date_time_2_from)? $request->date_time_2_from:null;
            $serviceTime->date_time_2_to=isset($request->date_time_2_to)? $request->date_time_2_to:null;
            $serviceTime->date_time_3_from=isset($request->date_time_3_from)? $request->date_time_3_from:null;
            $serviceTime->date_time_3_to=isset($request->date_time_3_to)? $request->date_time_3_to:null;
            $serviceTime->date_time_4_from=isset($request->date_time_4_from)? $request->date_time_4_from:null;
            $serviceTime->date_time_4_to=isset($request->date_time_4_to)? $request->date_time_4_to:null;
            $serviceTime->date_time_5_from=isset($request->date_time_5_from)? $request->date_time_5_from:null;
            $serviceTime->date_time_5_to=isset($request->date_time_5_to)? $request->date_time_5_to:null;
            $serviceTime->date_time_6_from=isset($request->date_time_6_from)? $request->date_time_6_from:null;
            $serviceTime->date_time_6_to=isset($request->date_time_6_to)? $request->date_time_6_to:null;
            $serviceTime->date_time_7_from=isset($request->date_time_7_from)? $request->date_time_7_from:null;
            $serviceTime->date_time_7_to=isset($request->date_time_7_to)? $request->date_time_7_to:null;
            $serviceTime->save();


        }
        if (!$list) {
            foreach (Cart::instance('editFujiService')->content() as $sp) {
                $ordDetail = new Fuji_service_detail();
                $ordDetail->fuji_service_id = $fuji_service->id;
                $ordDetail->part_id = $sp->id;
                $ordDetail->name = $sp->name;
                $ordDetail->price = $sp->price;
                $ordDetail->import_tax = $sp->options->import_tax;
                $ordDetail->additional_fee = $sp->options->additional_fee;
                $ordDetail->quantity = $sp->qty;
                $amount += ($sp->price * $sp->qty);
                $ordDetail->save();
            }
            $fuji_service->part_amount = $amount;
            $fuji_service->save();

        } else {
            $list1 = Fuji_service_detail::where('fuji_service_id', $id)->get();
            $array_tmp = array();
            foreach ($list1 as $data1) {
                $list1 = Fuji_service_detail::where('fuji_service_id', $id)->get();
                foreach ($list1 as $data) {
                    array_push($array_tmp, $data->part_id);
                }
                $amount = 0;
                foreach (Cart::instance('editFujiService')->content() as $sp) {
                    $value_data = $sp->id;
                    $amount += ($sp->price * $sp->qty);

                    if (in_array($value_data, $array_tmp, true)) {
                        if (($data1->part_id) == ($sp->id)) {
                            $data1->price = $sp->price;
                            $data1->quantity = $sp->qty;

                            $data1->update();
                        }
                    } else {
                        $list = new Fuji_service_detail();
                        $list->fuji_service_id = $fuji_service->id;
                        $list->part_id = $sp->id;
                        $list->name = $sp->name;
                        $list->quantity = $sp->qty;
                        $list->price = $sp->price;
                        $amount += ($sp->price * $sp->qty);
                        $list->save();
                    }
                    $fuji_service->part_amount = $amount;

                    $fuji_service->save();

                }
            }
            Cart::instance('editFujiService')->destroy();


        }


        Session::flash('success', 'Edit successfull!');

        return redirect('/admin/fujiservice');
    }

    /**
     * @return array
     */

}

