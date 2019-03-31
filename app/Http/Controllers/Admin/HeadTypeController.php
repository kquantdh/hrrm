<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Head_type;
use Session;

class HeadTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $head_types=Head_type::all();
        return view('admin.head_type.show',['head_types'=>$head_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.head_type.create');
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
            'price' => 'required',
           
            
        ],
            [
                'required' => ':attribute  is not blank',
                'integer' => ':attribute must be  int number',
                'numeric' => ':attribute must be  number',
            ],

            [
                'name' => 'Name ',
                'price' => 'Price '
                
            ]);
        $c= new Head_type();
        $c->name = $request->name;
        $c->price = $request->price;
        $c->save();

        return redirect('admin/headtype');
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
        $head_type=Head_type::findOrFail($id);
        return view('admin.head_type.edit',[
                'head_type'=>$head_type
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
        $head_type=Head_type::findOrFail($id);
        $head_type->name=$request->name;
        $head_type->price=$request->price;
        $head_type->save();
        Session::flash('success',"Cập nhật sản pham thanh cong");
        return redirect('admin/headtype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $head_type=Head_type::findOrFail($id);;
        $head_type->delete();
        Session::flash('success',"Xóa sản pham thanh cong");
        return redirect('admin/headtype');
    }
}
