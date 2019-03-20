<?php

namespace App\Exports;

use App\Part_price_list;
use Maatwebsite\Excel\Concerns\FromCollection;

class PartPriceListExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Part_price_list::all();
    }
}
