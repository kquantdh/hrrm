<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\In_stock_detail;
use Auth;
use Session;
use PDF;
class BarcodeController extends Controller
{
    public function barcodePrint($id) 
    {
        $in_stock_details = In_stock_detail::where('in_stock_id', $id)->get();
        $pdf=PDF::loadView('admin.barcode.barcode_print',['in_stock_details'=>$in_stock_details]);
        return $pdf->download('servicereport.pdf');
    
    }
    public function oneBarcodePrint($id)
    {
        $in_stock_details = In_stock_detail::where('barcode', $id)->get();

        $pdf=PDF::loadView('home.barcode.one_barcode_print',['in_stock_details'=>$in_stock_details]);
        return $pdf->download('barcodeInStock.pdf');

    }


}
