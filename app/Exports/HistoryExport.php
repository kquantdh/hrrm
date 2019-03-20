<?php

namespace App\Exports;

use App\Fuji_service;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HistoryExport implements FromView
{
    /**
    * @return \Illuminate\Support\FromView
    */
    public function view(): View
    {
        return view('admin.fuji_service.head_repair_report', [
            'fuji_services' => Fuji_service::all()
        ]);
    }
}
