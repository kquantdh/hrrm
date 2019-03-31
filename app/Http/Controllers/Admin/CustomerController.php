<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = 5;
        $page = $request->get('page',1);
        $stt = ((int)$page-1)*$limit;
        $customers=Customer::select('customers.*');

        $customers=$customers->orderBy('name', 'DESC')->paginate(5);
        return view('admin.customer.show',
                   ['customers'=>$customers,
                    'stt'=>$stt
                                         
        
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'full_name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'person' => 'required',
            'transport_price' => 'required|numeric',
            'normal_hrs' => 'required|numeric',
            'night_hrs' => 'required|numeric',
            'holiday_hrs' => 'required|numeric',
            'off_hrs' => 'required|numeric',
            
        ],
            [
                'required' => ':Attribute  is not blank',
                'integer' => ':Attribute must be  int number',
                'numeric' => ':Attribute must be  number',
            ],

            [
                'name' => 'Name ',
                'full_name' => 'Customer Full Name ',
                'address' => 'Address ',
                'mobile' => 'Mobile ',
                'person' => 'Person ',
                'transport_price' => 'Transport_price'
               
                
            ]);
        $c= new Customer();
        $c->name = $request->name;
        $c->full_name = $request->full_name;
        $c->address = $request->address;
        $c->mobile = $request->mobile;
        $c->person = $request->person;
        $c->transport_price = $request->transport_price;
        $c->usd_rate = $request->usd_rate;
        $c->jpy_rate = $request->jpy_rate;
        $c->normal_hrs = $request->normal_hrs;
        $c->night_hrs = $request->night_hrs;
        $c->holiday_hrs = $request->holiday_hrs;
        $c->off_hrs = $request->off_hrs;
        $c->save();
        Session::flash('success',"Create successfull");
        return redirect('admin/customer');
    }

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
        $customers=Customer::findOrFail($id);
        return view('admin.customer.edit',[
                'customers'=>$customers
            ]
        );
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
        $this->validate($request, [
            'name' => 'required',
            'full_name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'person' => 'required',
            'transport_price' => 'required|numeric',
            'normal_hrs' => 'required|numeric',
            'night_hrs' => 'required|numeric',
            'holiday_hrs' => 'required|numeric',
            'off_hrs' => 'required|numeric',

        ],
            [
                'required' => ':Attribute  is not blank',
                'integer' => ':Attribute must be  int number',
                'numeric' => ':Attribute must be  number',
            ],

            [
                'name' => 'Name ',
                'full_name' => 'Customer Full Name ',
                'address' => 'Address ',
                'mobile' => 'Mobile ',
                'person' => 'Person ',
                'transport_price' => 'Transport_price'


            ]);
        $customers=Customer::findOrFail($id);
        $customers->name=$request->name;
        $customers->full_name = $request->full_name;
        $customers->address=$request->address;
        $customers->mobile=$request->mobile;
        $customers->person=$request->person;
        $customers->transport_price = $request->transport_price;
        $customers->usd_rate = $request->usd_rate;
        $customers->jpy_rate = $request->jpy_rate;
        $customers->off_hrs = $request->off_hrs;
        $customers->normal_hrs = $request->normal_hrs;
        $customers->night_hrs = $request->night_hrs;
        $customers->holiday_hrs = $request->holiday_hrs;
        $customers->save();
        Session::flash('success',"Update successful");
        return redirect('admin/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customers=Customer::findOrFail($id);;
        $customers->delete();
        Session::flash('success',"Delete successful");
        return redirect('admin/customer');
    }
}
