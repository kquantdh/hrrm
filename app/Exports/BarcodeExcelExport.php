<?php

namespace App\Exports;
use App\Http\Controllers\Controller;

use App\In_stock_detail;


use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;


class BarcodeExcelExport implements FromQuery
{
    use Exportable;

    public function query($id)
    {
        return In_stock_detail::query()->where('barcode',$id);
    }
}
