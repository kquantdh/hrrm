<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fuji_service;
use App\Fuji_service_detail;
use App\Fuji_service_time_detail;
use App\Head_type;
use App\Customer;
use App\Part_price_list;
use Cart;
use PDF;
use Session;
use Carbon\Carbon;
use App\Exports\HistoryExport;
use Maatwebsite\Excel\Facades\Excel;

class FujiServiceController extends Controller
{
    private $_cates = [];
    private $_cust = [];

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

    public function index(Request $request)
    {

        $fuji_services = Fuji_service::all();
        $customers_ = Customer::all();
        $head_types = Head_type::all();
        return view('admin.fuji_service.show',
            ['fuji_services' => $fuji_services,
                'head_types' => $head_types,
                'customers' => $customers_]);
    }


    public function serviceReport($id)
    {
        $fuji_service = Fuji_service::where('id', $id)->first();
        $fuji_service->save();
        $list = Fuji_service_detail::where('fuji_service_id', $id)->get();
        return view('admin.fuji_service.service_report',
            ['fuji_service' => $fuji_service,
                'list' => $list]);
    }

    public function viewHeadRepairReport($id)
    {
        $fuji_service = Fuji_service::where('id', $id)->first();
        $fuji_service->save();
        $list = Fuji_service_detail::where('fuji_service_id', $id)->get();
        return view('admin.fuji_service.view_head_repair_report',
            ['fuji_service' => $fuji_service,
                'list' => $list]);
    }
    public function pdfHeadRepairReport($id)
    {
        $fuji_service = Fuji_service::where('id', $id)->first();
        $fuji_service->save();
        $list = Fuji_service_detail::where('fuji_service_id', $id)->get();
        $pdf = PDF::loadView('admin.fuji_service.pdf_head_repair_report',
            ['fuji_service' => $fuji_service,
                'list' => $list]);
        return $pdf->download('pdfHeadRepairReport.pdf');

    }


    public function viewQuotation($id)
    {
        $fuji_service = Fuji_service::where('id', $id)->first();
        $fuji_service->save();
        $list = Fuji_service_detail::where('fuji_service_id', $id)->get();
        return view('admin.fuji_service.view_quotation',
            ['fuji_services' => $fuji_service,
                'fuji_service_details' => $list]);
    }

    public function excelQuotation($id)
    {
        return Excel::download(new HistoryExport($id), 'quotation.xlsx');

    }

    public function pdfQuotation($id)
    {
        $fuji_service = Fuji_service::where('id', $id)->first();
        $fuji_service->save();
        $list = Fuji_service_detail::where('fuji_service_id', $id)->get();
        $pdf = PDF::loadView('admin.fuji_service.pdf_quotation',
            ['fuji_services' => $fuji_service,
                'fuji_service_details' => $list]);
        return $pdf->download('pdfQuotation.pdf');

    }
    public function pdfHeadTag($id)
    {
        $fuji_service = Fuji_service::where('id', $id)->first();
        $fuji_service->save();
        $list = Fuji_service_detail::where('fuji_service_id', $id)->get();
        $pdf = PDF::loadView('admin.fuji_service.pdf_head_tag',
            ['fuji_services' => $fuji_service,
                'fuji_service_details' => $list]);
        return $pdf->download('pdfHeadTag.pdf');

    }


    public function create(Request $request)
    {
        $limit = 5;
        $page = $request->get('page', 1);
        $stt = ((int)$page - 1) * $limit;
        $part_price_lists = Part_price_list::select('part_price_lists.*')
            ->where('part_price_lists.id', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.name', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.rep_new', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.description', 'like', '%' . $request->keyword . '%');
        $part_price_lists = $part_price_lists->orderBy('id', 'DESC')->paginate(7);
        $part_price_lists->appends(array('keyword' =>$request->keyword));




        return view('admin.fuji_service.create',
            ['head_types' => $this->_cates,
                'customers' => $this->_cust,
                'part_price_lists' => $part_price_lists,
                'stt' => $stt
            ]);
    }
    public function createMoreService(Request $request)
    {
        $limit = 5;
        $page = $request->get('page', 1);
        $stt = ((int)$page - 1) * $limit;
        $part_price_lists = Part_price_list::select('part_price_lists.*')
            ->where('part_price_lists.id', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.name', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.rep_new', 'like', '%' . $request->keyword . '%')
            ->orwhere('part_price_lists.description', 'like', '%' . $request->keyword . '%');
        $part_price_lists = $part_price_lists->orderBy('id', 'DESC')->paginate(5);
        $part_price_lists->appends(['search' => $request->keyword]);
        return view('admin.fuji_service.create_more_service',
            ['head_types' => $this->_cates,
                'customers' => $this->_cust,
                'part_price_lists' => $part_price_lists,
                'stt' => $stt
            ]);
    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parts = Part_price_list::all();
        $fuji_service = Fuji_service::where('id', $id)->first();
        $fuji_service->is_viewed = 1;
        $fuji_service->save();
        $list = Fuji_service_detail::where('fuji_service_id', $id)->get();
        foreach ($list as $buy)
            cart::add(array('id' => $buy->part_id, 'name' => $buy->name,
                'qty' => $buy->quantity, 'price' => $buy->price,
                'options' => array('part_no' => $buy->part_no, 'vn_name' => $buy->vn_name)));
        return view('admin.fuji_service.edit', [
            'head_types' => $this->_cates,
            'parts' => $parts,
            'list' => $list,
            'fuji_service' => $fuji_service,
            'customers' => $this->_cust]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'job_subject' => 'required',
            'discount_part' => 'integer',
            'problem' => 'required',
            'countermeasure' => 'required',
        ],[
            'required' => ':Attribute  is not blank',
            'integer' => ':Attribute must be integer number',
            'numeric' => ':Attribute must be numeric',
        ]);
        $y=new Fuji_service_detail();
        $ord = Fuji_service::create($request->all());
        $ord->save();
        $temp = Customer::where('id', $request->customer_id)->first();
        $temp_head_type = Head_type::where('id', $request->head_type_id)->first();
        //service fee
        $chargeTransport = ($request->entry * $temp->transport_price);//số lần ra vào nhà máy
        $chargeNormal = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->normal_hrs * $request->normal_hrs));
        $chargeNight = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->night_hrs * $request->night_hrs));
        $chargeOff = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->off_hrs * $request->off_hrs));
        $chargeHoliday = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->holiday_hrs * $request->holiday_hrs));
        $ord->service_amount = $chargeTransport + $chargeNormal + $chargeOff + $chargeNight + $chargeHoliday;
        if($request->job_type==4){
            $ord->transport_head_price=$temp->transport_price*$request->transfer_head_time;// số lần giao nhận head
            $ord->head_charge=$temp_head_type->price;
            $ord->discount_head=$request->discount_head;
        }

        $ord->save();
        //spare part total
        $amount_jpy = 0;//Tính báo giá part ra yên
        $amount_usd=0;//Tính báo giá part ra USd
        $amount=0;// Tính báo giá part ra VND
        $addition_fee_amount=0;
        foreach (Cart::instance('createFujiService')->content() as $sp) {
            $ordDetail = new Fuji_service_detail();
            $ordDetail->fuji_service_id = $ord->id;
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
            $ord->part_amount_jpy =0;
            $ord->part_amount_usd= 0;
            $ord->part_amount = 0;
            $ord->addition_fee_amount=0;
            $ord->save();

        }else{
            $ord->part_amount_jpy = $y->roundUpToNearestHundred($amount_jpy*(1 - ($request->discount_part / 100)));
            $ord->part_amount_usd= $y->roundUpToNearest($amount_usd*(1 - ($request->discount_part / 100)));
            $ord->part_amount = $y->roundUpToNearestTenThousand($amount*(1 - ($request->discount_part / 100)));
            $ord->addition_fee_amount=$y->roundUpToNearestTenThousand($addition_fee_amount);
            $ord->save();
        }

        $serviceTime = new Fuji_service_time_detail();
        $serviceTime->fuji_service_id = $ord->id;
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
        Cart::instance('createFujiService')->destroy();
        Session::flash('success', 'Add new successfull!');
        return redirect('/admin/fujiservice');

    }

    public function storeMoreService(Request $request)
    {
        $this->validate($request, [
            'job_subject' => 'required',
            'discount_part' => 'integer',
            'entry' => 'integer',
            'discount' => 'integer',
            'discount_part' => 'integer',
            'normal_hrs' => 'numeric',
            'night_hrs' => 'numeric',
            'off_hrs' => 'numeric',
            'normal_hrs' => 'numeric',
            'holiday_hrs' => 'numeric',
            'person_amount' => 'integer',
            'problem' => 'required',
            'countermeasure' => 'required',
        ],[
            'required' => ':Attribute  is not blank',
            'integer' => ':Attribute must be integer number',
            'numeric' => ':Attribute must be numeric'
        ]);
        $y=new Fuji_service_detail();
        $ord = Fuji_service::create($request->all());
        $ord->save();
        $temp = Customer::where('id', $request->customer_id)->first();
        $temp_head_type = Head_type::where('id', $request->head_type_id)->first();
        //head repair fee
        $chargeRepairHead=$temp_head_type->price + $temp->transport_price;
        //service fee
        $chargeTransport = ($request->entry * $temp->transport_price);
        $chargeNormal = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->normal_hrs * $request->normal_hrs));
        $chargeNight = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->night_hrs * $request->night_hrs));
        $chargeOff = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->off_hrs * $request->off_hrs));
        $chargeHoliday = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->holiday_hrs * $request->holiday_hrs));
        $ord->service_amount = $chargeTransport + $chargeNormal + $chargeOff + $chargeNight + $chargeHoliday;
        if($request->job_type==4){
            $ord->transport_head_price=$temp->transport_price*$request->transfer_head_time;// số lần giao nhận head
            $ord->head_charge=$temp_head_type->price;
        }
        $ord->save();
        //spare part total
        $amount_jpy = 0;//Tính báo giá part ra yên
        $amount_usd=0;//Tính báo giá part ra USd
        $amount=0;// Tính báo giá part ra VND
        $addition_fee_amount=0;
        foreach (Cart::instance('createFujiService')->content() as $sp) {
            $ordDetail = new Fuji_service_detail();
            $ordDetail->fuji_service_id = $ord->id;
            $ordDetail->part_id = $sp->id;
            $ordDetail->name = $sp->name;
            $ordDetail->price = $sp->price;
            $ordDetail->import_tax = $sp->options->import_tax;
            $ordDetail->additional_fee = $sp->options->additional_fee;
            $ordDetail->quantity = $sp->qty;
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
            $ord->part_amount_jpy =0;
            $ord->part_amount_usd= 0;
            $ord->part_amount = 0;
            $ord->addition_fee_amount=0;
            $ord->save();

        }else{
            $ord->part_amount_jpy = $y->roundUpToNearestHundred($amount_jpy*(1 - ($request->discount_part / 100)));
            $ord->part_amount_usd= $y->roundUpToNearest($amount_usd*(1 - ($request->discount_part / 100)));
            $ord->part_amount = $y->roundUpToNearestTenThousand($amount*(1 - ($request->discount_part / 100)));
            $ord->addition_fee_amount=$y->roundUpToNearestTenThousand($addition_fee_amount);
            $ord->save();
        }

        $serviceTime = new Fuji_service_time_detail();
        $serviceTime->fuji_service_id = $ord->id;
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


        Cart::instance('createFujiService')->destroy();
        Session::flash('success', 'Add new successfull!');
        return redirect('/admin/fujiservice');

    }

    public function storeEditCopy(Request $request)
    {
        $this->validate($request, [
            'job_subject' => 'required',
            'discount_part' => 'integer',
            'problem' => 'required',
            'countermeasure' => 'required',
        ],
            [
                'required' => ':Attribute  is not blank',
                'integer' => ':Attribute must be integer number',
                'numeric' => ':Attribute must be numeric',
            ],

            [

            ]);

        $ord = Fuji_service::create($request->all());
        $ord->save();
        $temp = Customer::where('id', $request->customer_id)->first();
        $chargeTransport = ($request->entry * $temp->transport_price);
        $chargeNormal = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->normal_hrs * $request->normal_hrs));
        $chargeNight = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->night_hrs * $request->night_hrs));
        $chargeOff = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->off_hrs * $request->off_hrs));
        $chargeHoliday = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->holiday_hrs * $request->holiday_hrs));
        $ord->service_amount = $chargeTransport + $chargeNormal + $chargeOff + $chargeNight + $chargeHoliday;
        $ord->save();
        $amount = 0;
        foreach (Cart::instance('editFujiServiceCopy')->content() as $sp) {
            $ordDetail = new Fuji_service_detail();
            $ordDetail->fuji_service_id = $ord->id;
            $ordDetail->part_id = $sp->id;
            $ordDetail->name = $sp->name;
            $ordDetail->price = $sp->price;
            $ordDetail->import_tax = $sp->options->import_tax;
            $ordDetail->additional_fee = $sp->options->additional_fee;
            $ordDetail->quantity = $sp->qty;
            $ordDetail->save();
            $amount += round($sp->price*$sp->qty*$temp->jpy_rate*$temp->jpy_vnd_rate,-3) * (1.1+$sp->options->import_tax/100+$sp->options->import_tax/1000)+$sp->options->additional_fee;
            // $amount= price*quantity*jpy_rate*jpy_vnd_rate+ price*quantity*jpy_rate*jpy_vnd_rate*import_tax
            // +(price*quantity*jpy_rate*jpy_vnd_rate+price*quantity*jpy_rate*jpy_vnd_rate*import_tax)*VAT(10%)
            // +additional_fee

        }
        $ord->part_amount = round($amount*(1 - ($request->discount_part / 100)),-4);
        $ord->save();

        Cart::instance('editFujiServiceCopy')->destroy();
        Session::flash('success', 'Add new successfull!');
        return redirect('/admin/fujiservice');

    }
    public function storeEditCopyMoreService(Request $request)
    {
        $this->validate($request, [
            'job_subject' => 'required',
            'discount_part' => 'integer',
            'entry' => 'integer',
            'discount' => 'integer',
            'discount_part' => 'integer',
            'normal_hrs' => 'numeric',
            'night_hrs' => 'numeric',
            'off_hrs' => 'numeric',
            'normal_hrs' => 'numeric',
            'holiday_hrs' => 'numeric',
            'person_amount' => 'integer',
            'problem' => 'required',
            'countermeasure' => 'required',
        ],
            [
                'required' => ':Attribute  is not blank',
                'integer' => ':Attribute must be integer number',
                'numeric' => ':Attribute must be numeric',
            ],

            [

            ]);

        $ord = Fuji_service::create($request->all());
        $ord->save();
        $temp = Customer::where('id', $request->customer_id)->first();
        $chargeTransport = ($request->entry * $temp->transport_price);
        $chargeNormal = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->normal_hrs * $request->normal_hrs));
        $chargeNight = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->night_hrs * $request->night_hrs));
        $chargeOff = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->off_hrs * $request->off_hrs));
        $chargeHoliday = ($request->person_amount * (1 - ($request->discount / 100)) * ($temp->holiday_hrs * $request->holiday_hrs));
        $ord->service_amount = $chargeTransport + $chargeNormal + $chargeOff + $chargeNight + $chargeHoliday;
        $ord->save();
        $amount = 0;
        foreach (Cart::instance('editFujiServiceCopy')->content() as $sp) {
            $ordDetail = new Fuji_service_detail();
            $ordDetail->fuji_service_id = $ord->id;
            $ordDetail->part_id = $sp->id;
            $ordDetail->name = $sp->name;
            $ordDetail->price = $sp->price;
            $ordDetail->import_tax = $sp->options->import_tax;
            $ordDetail->additional_fee = $sp->options->additional_fee;
            $ordDetail->quantity = $sp->qty;
            $ordDetail->save();
            $amount += round($sp->price*$sp->qty*$temp->jpy_rate*$temp->jpy_vnd_rate,-3) * (1.1+$sp->options->import_tax/100+$sp->options->import_tax/1000)+$sp->options->additional_fee;
            // $amount= price*quantity*jpy_rate*jpy_vnd_rate+ price*quantity*jpy_rate*jpy_vnd_rate*import_tax
            // +(price*quantity*jpy_rate*jpy_vnd_rate+price*quantity*jpy_rate*jpy_vnd_rate*import_tax)*VAT(10%)
            // +additional_fee

        }
        $ord->part_amount = round($amount*(1 - ($request->discount_part / 100)),-4);
        $ord->save();

        Cart::instance('editFujiServiceCopy')->destroy();
        Session::flash('success', 'Add new successfull!');
        return redirect('/admin/fujiservice');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {

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

        return redirect('admin/fujiservice/create/edit/' . $id);
    }


    public function updateEdit(Request $request, $id)
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

        return redirect('admin/fujiservice/create/edit' . $id);
    }*/

    public function delete($id)
    {
        $fuji_services = Fuji_service::findOrFail($id);
        $fuji_services->delete();
        $list1 = Fuji_service_detail::where('fuji_service_id', $id)->get();
        foreach ($list1 as $data) {
            $data->delete();
        }

        return redirect('admin/fujiservice');
    }

    public function serviceReportPDF($id)
    {
        $fuji_service = Fuji_service::where('id', $id)->first();
        $fuji_service->save();
        $list = Fuji_service_detail::where('fuji_service_id', $id)->get();
        $pdf = PDF::loadView('admin.fuji_service.service_report_pdf',
            ['fuji_service' => $fuji_service,
                'list' => $list]);
        return $pdf->download('servicereport.pdf');

    }



}
