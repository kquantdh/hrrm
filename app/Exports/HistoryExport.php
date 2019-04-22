<?php

namespace App\Exports;

use App\Fuji_service;
use App\Fuji_service_detail;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HistoryExport implements FromView
{
    /**
    * @return \Illuminate\Support\FromView
    */

    public function __construct($id)
    {
        $this->id = $id;
    }
    public function view():View
    {
        return view('admin.fuji_service.excel_quotation', [
            'fuji_services' => Fuji_service::where('id',$this->id)->get(),
            'fuji_service_details'=>Fuji_service_detail::where('fuji_service_id',$this->id)->get()
        ]);
    }
}
