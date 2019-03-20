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

    public function index()
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

    
    /*public function store(Request $request)
    {
        $p=new Fuji_service();
        $p->sr_no = $request->sr_no;
        $p->customer_id=$request->customer_id;
        $p->head_type_id=$request->head_type_id;
        $p->head_serial=$request->head_serial;
        $p->status=$request->status;
        $p->nature_service=$request->nature_service;
        $p->problem=htmlentities($request->problem);
        $p->action=htmlentities($request->action);
        $p->price=$request->price;
        $officialDate = Carbon::now();
        switch ($request->status){
            case "Stock Recieve":
                $p->stock_recieve_date=$officialDate;
                break;
            case "Start Inspection":
                $p->start_inspection_date=$officialDate;
                break;
            case "Inspection Done":
                $p->inspection_done_date=$officialDate;
                break;
            case "Sent Quotation":
                $p->sent_quotation_date=$officialDate;
                break;
            case "Got PO":
                $p->got_po_date=$officialDate;
                break;
            case "Got Part":
                $p->got_part_date=$officialDate;
                break;
            case "Repair Done":
                $p->repair_done_date=$officialDate;
                break;
            case "Delivery":
                $p->delevery_date=$officialDate;
                break;

        }

        //$p->thumbnail = $thumbnail;
        $p->save();

        return redirect('admin/fujiservice');
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        if ($request->payment == 0) {

            if (count(Cart::content()) > 0) {
                $ord = new Fuji_service();
                $ord->customer_id = $request->customer_id;
                $ord->quotation = $request->quotation;
                $ord->po = $request->po;
                $ord->sr_no = $request->sr_no;
                $ord->invoice = $request->invoice;
                $ord->head_type_id = $request->head_type_id;
                $ord->head_serial = $request->head_serial;
                $ord->nature_service = $request->nature_service;
                $ord->status = $request->status;
                $ord->problem =$request->problem;
                $ord->countermeasure = $request->countermeasure;
                $ord->save();
                $amount = 0;
                foreach (Cart::content() as $sp) {
                    $ordDetail = new Fuji_service_detail();
                    $ordDetail->fuji_service_id = $ord->id;
                    $ordDetail->part_id = $sp->id;
                    $ordDetail->name = $sp->name;
                    
                    $ordDetail->vn_name = $sp->options->vn_name;
                    $ordDetail->location = $sp->options->location;
                    $ordDetail->price = $sp->price;
                    $ordDetail->quantity = $sp->qty;
                    $ordDetail->amount = $sp->price * $sp->qty;
                    $ordDetail->save();
                    $amount += ($sp->price * $sp->qty);
                }
                $ord->save();
            }
            Cart::destroy();
            Session::flash('success', 'Add new successfull!');
            return redirect('/admin/fujiservice');
        }
        else {
            if (count(Cart::content()) > 0) {
                $amount = Cart::subtotal();

                return redirect()->away();
            }
        }
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
        /*$fuji_services=Fuji_service::findOrFail($id);
        /* $thumbnail=$product->thumbnail;
         if($request->hasFile('thumbnail')){
             $file=$request->file('thumbnail');
             $thumbnail=$file->getClientOriginalName();
             $path=public_path('uploads/product');
             $file->move($path,$thumbnail);
         }

         /*$product->title=$request->title;
         $product->head_type_id=$request->head_type_id;
         $product->price=$request->price;
         $product->thumbnail = $thumbnail;
         $product->save();*/
        /*$fuji_services->sr_no = $request->sr_no;
        $fuji_services->customer_id=$request->customer_id;
        $fuji_services->head_type_id=$request->head_type_id;
        $fuji_services->head_serial=$request->head_serial;
        $fuji_services->status=$request->status;
        $fuji_services->nature_service=$request->nature_service;
        $fuji_services->problem=$request->problem;
        $fuji_services->action=$request->action;
        $fuji_services->price=$request->price;

        $officialDate = Carbon::now();
        switch ($request->status){
            case "Stock Recieve":
                $fuji_services->stock_recieve_date=$officialDate;
                break;
            case "Start Inspection":
                $fuji_services->start_inspection_date=$officialDate;
                break;
            case "Inspection Done":
                $fuji_services->inspection_done_date=$officialDate;
                break;
            case "Sent Quotation":
                $fuji_services->sent_quotation_date=$officialDate;
                break;
            case "Got PO":
                $fuji_services->got_po_date=$officialDate;
                break;
            case "Got Part":
                $fuji_services->got_part_date=$officialDate;
                break;
            case "Repair Done":
                $fuji_services->repair_done_date=$officialDate;
                break;
            case "Delivery":
                $fuji_services->delevery_date=$officialDate;
                break;

        }

        $fuji_services->save();
        return redirect('admin/fujiservice');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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
    public function historyExport() 
    {
    return Excel::download(new HistoryExport, 'invoices.xlsx');
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
