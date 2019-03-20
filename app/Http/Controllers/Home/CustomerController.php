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
        $limit = 20;
        $page = $request->get('page',1);
        $stt = ((int)$page-1)*$limit;
        
        $customers=Customer::all();
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
            'address' => 'required',
            'mobile' => 'required',
            'person' => 'required',
            'transport_price' => 'required|numeric',
            
        ],
            [
                'required' => ':attribute  is not blank',
                'integer' => ':attribute must be  int number',
                'numeric' => ':attribute must be  number',
            ],

            [
                'name' => 'Name ',
                'address' => 'Address ',
                'mobile' => 'Mobile ',
                'person' => 'Person ',
                'transport_price' => 'Transport_price'
               
                
            ]);
        $c= new Customer();
        $c->name = $request->name;
        $c->address = $request->address;
        $c->mobile = $request->mobile;
        $c->person = $request->person;
        $c->transport_price = $request->transport_price;
        $c->usd_rate = $request->usd_rate;
        $c->jpy_rate = $request->jpy_rate;
        $c->save();
        Session::flash('success',"Tao moi thanh cong");
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
        $customers=Customer::findOrFail($id);
        $customers->name=$request->name;
        $customers->address=$request->address;
        $customers->mobile=$request->mobile;
        $customers->person=$request->person;
        $customers->transport_price = $request->transport_price;
        $customers->usd_rate = $request->usd_rate;
        $customers->jpy_rate = $request->jpy_rate;
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
