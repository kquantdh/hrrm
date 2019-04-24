<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fuji_service;
use App\Fuji_service_detail;
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
    private $_cates=[];
    private $_cust=[];
    
    public function __construct()
    {
        $head_types=Head_type::all();
        $customers=Customer::all();
       
        foreach ($head_types as $head_type){
            $this->_cates[$head_type->id]=$head_type->name;
        }
        foreach ($customers as $customer){
            $this->_cust[$customer->id]=$customer->name;
        } 
    }

    public function index(Request $request)
    {

        $fuji_services=Fuji_service::all();
        $customers_=Customer::all();
        $head_types=Head_type::all();
        return view('admin.fuji_service.show',
            ['fuji_services'=>$fuji_services,
                'head_types'=>$head_types,
                'customers'=>$customers_]);
    }
    

    public function serviceReport($id)
    {
        $fuji_service = Fuji_service::where('id', $id)->first();
        $fuji_service->save();
        $list = Fuji_service_detail::where('fuji_service_id', $id)->get();
        return view('admin.fuji_service.service_report',
            ['fuji_service'=>$fuji_service,
            'list' => $list]);
    }
    public function headRepairReport($id)
    {
        $fuji_service = Fuji_service::where('id', $id)->first();
        $fuji_service->save();
        $list = Fuji_service_detail::where('fuji_service_id', $id)->get();
        return view('admin.fuji_service.head_repair_report',
            ['fuji_service'=>$fuji_service,
            'list' => $list]);
    }

    public function viewQuotation($id)
    {
        $fuji_service = Fuji_service::where('id', $id)->first();
        $fuji_service->save();
        $list = Fuji_service_detail::where('fuji_service_id', $id)->get();
        return view('admin.fuji_service.view_quotation',
            ['fuji_services'=>$fuji_service,
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
        $pdf=PDF::loadView('admin.fuji_service.pdf_quotation',
            ['fuji_services'=>$fuji_service,
                'fuji_service_details' => $list]);
        return $pdf->download('pdfQuotation.pdf');

    }



    public function create(Request $request)
    {
        $limit = 5;
        $page = $request->get('page',1);
        $stt = ((int)$page-1)*$limit;
        $part_price_lists=Part_price_list::select('part_price_lists.*')
                        ->where('part_price_lists.id','like','%'.$request->keyword.'%')
                        ->orwhere('part_price_lists.name','like','%'.$request->keyword.'%')
                        ->orwhere('part_price_lists.rep_new','like','%'.$request->keyword.'%')                        
                        ->orwhere('part_price_lists.description','like','%'.$request->keyword.'%');
        $part_price_lists=$part_price_lists->orderBy('id', 'DESC')->paginate(5);
        return view('admin.fuji_service.create',
            ['head_types'=>$this->_cates,
             'customers'=>$this->_cust,
            'part_price_lists'=>$part_price_lists,
            'stt'=>$stt
                ]);
    }




    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parts=Part_price_list::all();
        $fuji_service = Fuji_service::where('id', $id)->first();
        $fuji_service->is_viewed=1;
        $fuji_service->save();
        $list = Fuji_service_detail::where('fuji_service_id', $id)->get();
        foreach ($list as $buy)
        cart::add(array('id' => $buy->part_id, 'name' => $buy->name,
        'qty' => $buy->quantity, 'price' => $buy->price,
        'options' => array('part_no' => $buy->part_no, 'vn_name' => $buy->vn_name)));
        return view('admin.fuji_service.edit',[
                'head_types'=>$this->_cates,
                 'parts'=>$parts,
                'list' => $list,
                'fuji_service' => $fuji_service,
                'customers'=>$this->_cust ]);
    }


    public function store(Request $request)
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
            'person_amount' => 'integer',
        ],
            [
                'required' => ':Attribute  is not blank',
                'integer' => ':Attribute must be integer number',
                'numeric' => ':Attribute must be numeric',
            ],

            [

            ]);

                $ord = new Fuji_service();
                $ord->customer_id = $request->customer_id;
                $ord->job_type = $request->job_type;
                $ord->quotation = $request->quotation;
                $ord->po = $request->po;
                $ord->sr_no = $request->sr_no;
                $ord->invoice = $request->invoice;
                $ord->head_type_id = $request->head_type_id;
                $ord->head_serial = $request->head_serial;
                $ord->nature_service = $request->nature_service;
                $ord->status = $request->status;
                $ord->entry = $request->entry;
                $ord->discount = $request->discount;
                $ord->discount_part = $request->discount_part;
                $ord->normal_hrs = $request->normal_hrs;
                $ord->night_hrs = $request->night_hrs;
                $ord->off_hrs = $request->off_hrs;
                $ord->holiday_hrs = $request->holiday_hrs;
                $ord->person_amount = $request->person_amount;
                $ord->problem =$request->problem;
                $ord->countermeasure = $request->countermeasure;
                $ord->save();
                $temp=Customer::where('id', $request->customer_id)->first();
        $chargeTransport=($request->entry*$temp->transport_price);
        $chargeNormal=($request->person_amount*(1-($request->discount/100))*($temp->normal_hrs*$request->normal_hrs));
        $chargeNight=($request->person_amount*(1-($request->discount/100))*($temp->night_hrs*$request->night_hrs));
        $chargeOff=($request->person_amount*(1-($request->discount/100))*($temp->off_hrs*$request->off_hrs));
        $chargeHoliday=($request->person_amount*(1-($request->discount/100))*($temp->holiday_hrs*$request->holiday_hrs));
        $ord->service_amount = $chargeTransport+$chargeNormal+$chargeOff+$chargeNight+$chargeHoliday;
                 $ord->save();
                $amount = 0;
                foreach (Cart::instance('createFujiService')->content() as $sp) {
                    $ordDetail = new Fuji_service_detail();
                    $ordDetail->fuji_service_id = $ord->id;
                    $ordDetail->part_id = $sp->id;
                    $ordDetail->name = $sp->name;
                    $ordDetail->price = $sp->price;
                    $ordDetail->quantity = $sp->qty;
                    $ordDetail->save();
                    $amount += ($sp->price * $sp->qty);
                }
                $ord->part_amount = $amount;
                $ord->save();

            Cart::instance('createFujiService')->destroy();
            Session::flash('success', 'Add new successfull!');
            return redirect('/admin/fujiservice');

    }
    public function storeCopy(Request $request)
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
            'person_amount' => 'integer',
        ],
            [
                'required' => ':Attribute  is not blank',
                'integer' => ':Attribute must be integer number',
                'numeric' => ':Attribute must be numeric',
            ],

            [

            ]);

        $ord = new Fuji_service();
        $ord->customer_id = $request->customer_id;
        $ord->job_type = $request->job_type;
        $ord->quotation = $request->quotation;
        $ord->po = $request->po;
        $ord->sr_no = $request->sr_no;
        $ord->invoice = $request->invoice;
        $ord->head_type_id = $request->head_type_id;
        $ord->head_serial = $request->head_serial;
        $ord->nature_service = $request->nature_service;
        $ord->status = $request->status;
        $ord->entry = $request->entry;
        $ord->discount = $request->discount;
        $ord->discount_part = $request->discount_part;
        $ord->normal_hrs = $request->normal_hrs;
        $ord->night_hrs = $request->night_hrs;
        $ord->off_hrs = $request->off_hrs;
        $ord->holiday_hrs = $request->holiday_hrs;
        $ord->person_amount = $request->person_amount;
        $ord->problem =$request->problem;
        $ord->countermeasure = $request->countermeasure;
        $ord->save();
        $temp=Customer::where('id', $request->customer_id)->first();
        $chargeTransport=($request->entry*$temp->transport_price);
        $chargeNormal=($request->person_amount*(1-($request->discount/100))*($temp->normal_hrs*$request->normal_hrs));
        $chargeNight=($request->person_amount*(1-($request->discount/100))*($temp->night_hrs*$request->night_hrs));
        $chargeOff=($request->person_amount*(1-($request->discount/100))*($temp->off_hrs*$request->off_hrs));
        $chargeHoliday=($request->person_amount*(1-($request->discount/100))*($temp->holiday_hrs*$request->holiday_hrs));
        $ord->service_amount = $chargeTransport+$chargeNormal+$chargeOff+$chargeNight+$chargeHoliday;
        $ord->save();
        $amount = 0;
        foreach (Cart::instance('editFujiServiceCopy')->content() as $sp) {
            $ordDetail = new Fuji_service_detail();
            $ordDetail->fuji_service_id = $ord->id;
            $ordDetail->part_id = $sp->id;
            $ordDetail->name = $sp->name;
            $ordDetail->price = $sp->price;
            $ordDetail->quantity = $sp->qty;
            $ordDetail->save();
            $amount += ($sp->price * $sp->qty);
        }
        $ord->part_amount = $amount;
        $ord->save();

        Cart::instance('editFujiServiceCopy')->destroy();
        Session::flash('success', 'Add new successfull!');
        return redirect('/admin/fujiservice');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        return redirect('admin/fujiservice/create/edit/'.$id);
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

        return redirect('admin/fujiservice/create/edit'.$id);
    }

    public function delete($id)
    {
        $fuji_services=Fuji_service::findOrFail($id);
        $fuji_services->delete();
        $list1 = Fuji_service_detail::where('fuji_service_id', $id)->get();
        foreach ($list1 as $data){
            $data->delete();
        }
        
        return redirect('admin/fujiservice');
    }

    public function serviceReportPDF ($id) 
    {
        $fuji_service = Fuji_service::where('id', $id)->first();
        $fuji_service->save();
        $list = Fuji_service_detail::where('fuji_service_id', $id)->get();
        $pdf=PDF::loadView('admin.fuji_service.service_report_pdf',
                          ['fuji_service'=>$fuji_service,
                                  'list' => $list]);
        return $pdf->download('servicereport.pdf');
    
    }


}
