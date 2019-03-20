<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Part_price_list;
use App\Imports\PartPriceListsImport;
use App\Exports\PartsExport;
use Maatwebsite\Excel\Facades\Excel;

class PricePartListController extends Controller
{
    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $part_price_lists=Part_price_list::select('part_price_lists.*');

        if ($request->fieldChoose=='part_no'){
            $part_price_lists->where('part_price_lists.part_no','like','%'.$request->keyword.'%')
                ;}
        if ($request->fieldChoose=='name'){
            $part_price_lists->where('part_price_lists.name','like','%'.$request->keyword.'%')
            ;}
        



        $part_price_lists=$part_price_lists->orderBy('id', 'DESC')->paginate(10);
           


       
        return view('admin.part_price_list.show_price',['part_price_lists'=>$part_price_lists]);
    }


    public function import(Request $request)
    {
        if($request->hasFile('part_price_lists')){                        
            Excel::import(new PartPriceListsImport,$request->file('part_price_lists'),'',\Maatwebsite\Excel\Excel::XLSX);
        
        }
            return redirect('/')->with('success', 'All good!');
    }
            
}
