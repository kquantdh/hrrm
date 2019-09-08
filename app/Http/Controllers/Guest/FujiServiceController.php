<?php
namespace App\Http\Controllers\Guest;

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
        return view('guest.fuji_service.show',
            ['fuji_services'=>$fuji_services,
                'head_types'=>$head_types,
                'customers'=>$customers_]);
    }
    


}
