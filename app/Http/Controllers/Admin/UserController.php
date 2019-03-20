<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $limit = 10;
        $page = $request->get('page',1);
        $stt = ((int)$page-1)*$limit;

        $users=User::select('users.*');


        $users=$users->orderBy('id', 'DESC')->paginate(10);
        return view('admin.user.index',
            ['users'=>$users,
                'stt'=>$stt
                ]);
    }
    public function edit($id ,Request $request)
    {
        $users=User::where('id',$id)->first();
        return view('admin.user.edit',
            ['users'=>$users,

            ]);
    }
    public function update(Request $request, $id){

        $users = User::findOrFail($id);

        $users->name = $request->name;
        $users->group_id = $request->group_id;
        $users->save();

        Session::flash('successAddPart', 'Edit Access Permission successfull!');
        return redirect('/admin/user');
    }
}
