<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuji_service;
use App\Head_type;
use App\Customer;
use Session;
use Carbon\Carbon;

class FujiServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        return view('home.fuji_service.show',
            ['fuji_services'=>$fuji_services,
                'head_types'=>$head_types,
                'customers'=>$customers_]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}

