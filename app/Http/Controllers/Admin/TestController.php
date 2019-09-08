<?php

namespace App\Http\Controllers\Admin;

use App\Part_price_list;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class TestController extends Controller
{
    public  function  index()
    {
        return view('admin.test.index');
    }

    public function apiTest()
    {
        $data = Part_price_list::limit(10)->get();
        $aaData =[];
        foreach ($data as $item) {
            $row = $item->toArray();
            $aaData [] = $row;
        }
        $result['draw'] = 1;
        $result['recordsTotal'] = Part_price_list::count();
        $result['recordsFiltered'] =Part_price_list::count();
        $result['data'] = $aaData;
        return response()->json($result,200);
    }
}

?>