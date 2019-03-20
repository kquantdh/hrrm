<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Part_price_list;
use App\Imports\PartPriceListsImport;
use App\Exports\PartPriceListExport;
use Maatwebsite\Excel\Facades\Excel;
use Session;

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
    {  $limit = 10;
        $page = $request->get('page',1);
        $stt = ((int)$page-1)*$limit;
        
        $part_price_lists=Part_price_list::select('part_price_lists.*');

        if ($request->fieldChoose=='id'){
            $part_price_lists->where('part_price_lists.id','like','%'.$request->keyword.'%')
                ;}
        if ($request->fieldChoose=='name'){
            $part_price_lists->where('part_price_lists.name','like','%'.$request->keyword.'%')
            ;}
        $part_price_lists=$part_price_lists->orderBy('id', 'DESC')->paginate(10);
        return view('admin.part_price_list.show_price',
            ['part_price_lists'=>$part_price_lists,
                'stt'=>$stt
                ]);
    }

    public function create(Request $request)
    {
        return view('admin.part_price_list.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|unique:part_price_lists',
            'name' => 'required',
            'price' => 'required|numeric',
            //'detail' =>'required|max:200'
        ],
            ['required' => ':attribute  is not blank',
                'required|max:30' => ':attribute  is over 30 charactor or not blank ',
                'required|numeric' => ':attribute  is number ',
                'required|unique:part_price_lists' => ':attribute  is not unique ',

            ],
            ['id' => 'ID ',
                'name' => 'Name ',
                'price' => 'Price ',
                'detail' => 'Detail ',

            ]);

                $ord = new Part_price_list();
                $ord->id = $request->id;
                $ord->name = $request->name;
                $ord->description = $request->description;
                $ord->rep_new = $request->rep_new;
                $ord->machine = $request->machine;
                $ord->price = $request->price;
                $ord->vn_name = $request->vn_name;
                $ord->material = $request->material;
                $ord->detail = $request->detail;
                $ord->save();

            Session::flash('successAddPart', 'Add new part successfull!');
            return redirect('/admin/partpricelist');

    }
    public function edit($id ,Request $request)
    {
        $part_price_lists=Part_price_list::where('id',$id)->first();
        return view('admin.part_price_list.edit',
            ['part_price_lists'=>$part_price_lists,

            ]);
    }
    public function update(Request $request, $id){
        $this->validate($request, [
           // 'id' => 'required|unique:part_price_lists',
            'name' => 'required',
            'price' => 'required|numeric',
            'detail' =>'max:50'
        ],
            ['required' => ':attribute  is not blank',
                'required|max:30' => ':attribute  is over 30 charactor or not blank ',
                'required|numeric' => ':attribute  is number ',
                'required|unique:part_price_lists' => ':attribute  is not unique ',
                'max:30' => ':attribute  is over 30 charactor ',

            ],
            ['id' => 'ID ',
                'name' => 'Name ',
                'price' => 'Price ',
                'detail' => 'Detail ',

            ]);

        $part_price_lists = Part_price_list::findOrFail($id);
        $part_price_lists->id = $request->id;
        $part_price_lists->name = $request->name;
        $part_price_lists->description = $request->description;
        $part_price_lists->rep_new = $request->rep_new;
        $part_price_lists->machine = $request->machine;
        $part_price_lists->price = $request->price;
        $part_price_lists->vn_name = $request->vn_name;
        $part_price_lists->material = $request->material;
        $part_price_lists->detail = $request->detail;
        $part_price_lists->save();
        Session::flash('successAddPart', 'Edit part successfull!');
        return redirect('/admin/partpricelist');
    }
    public function exportPartPriceList(){
        return Excel::download(new PartPriceListExport,'PartPriceListExport.xlsx');
    }
    public function importModal(){
        return view('admin.part_price_list.import_excel');

    }

    public function import(Request $request)

    {
        $this->validate($request, [

            'part_price_lists' => 'required|mimes:xlsx|max:5000',

        ]);
        if($request->hasFile('part_price_lists')){
            Excel::import(new PartPriceListsImport,$request->file('part_price_lists'),'',\Maatwebsite\Excel\Excel::XLSX);

        }else{
            return redirect('/admin/partpricelist')->with('warning', 'No attach!');
        }

            return redirect('/admin/partpricelist')->with('success', 'All good!');
    }
    public function delete()
    {
        Part_price_list::select('part_price_lists.*')->truncate();

        return redirect('admin/partpricelist');
    }

}
