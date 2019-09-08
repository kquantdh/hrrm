<?php

namespace App\Imports;

use App\Part_price_list;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class PartPriceListsImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading
{

    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Part_price_list([
            'id'=>$row['id'],
            'name'=>$row['name'],
            'description'=>$row['description'],
            'rep_new'=>$row['rep_new'],
            'machine'=>$row['machine'],
            'quantity'=>$row['quantity'],
            'price'=>$row['price'],
            'vn_name'=>$row['vn_name'],
            'material'=>$row['material'],
            'detail'=>$row['detail'],

        ]);
        
    }
    public function batchSize(): int
    {
        return 6000;
    }

    public function chunkSize(): int
    {
        return 6000;
    }

}



