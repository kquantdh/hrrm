<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\In_stock_detail;
use Auth;
use Maatwebsite\Excel\Excel;
use Session;
use PDF;




class BarcodeController extends Controller
{
    public function barcodePrint($id)
    {
        $i = 0;
        $in_stock_details = In_stock_detail::where('in_stock_id', $id)->where('is_deleted', 0)->get();
        $customPaper = array(0, 0, 285.73, 59.86);
        $pdf = PDF::loadView('admin.barcode.barcode_print', ['in_stock_details' => $in_stock_details, 'i' => $i])->setPaper($customPaper, 'portrait');

        // $pdf=PDF::loadView('admin.barcode.barcode_print',['in_stock_details'=>$in_stock_details,'i'=>$i]);
        return $pdf->download('barcodeInStock.pdf');

    }

    public function oneBarcodePrint($id)
    {

        $in_stock_details = In_stock_detail::where('barcode', $id)->get();
        $customPaper = array(0, 0, 285.73, 59.86);

        $pdf = PDF::loadView('admin.barcode.barcode_print', ['in_stock_details' => $in_stock_details])->setPaper($customPaper, 'portrait');
        return $pdf->download('barcodeInStock.pdf');

    }
    public function excel($id)
    {
        $in_stock_details = In_stock_detail::where('in_stock_id', $id)->get();


        return \Excel::download('12345','barcode.csv','Csv');



    }



}
