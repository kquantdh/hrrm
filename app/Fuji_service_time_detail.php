<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuji_service_time_detail extends Model
{
    protected $table='fuji_service_time_details';
    public function fuji_service(){
        return $this->belongsTo('App\Fuji_service', 'fuji_service_id', 'id');
    }

    public function part_price_list(){
        return $this->belongsTo('App\Part_price_list', 'part_id', 'id');
    }
}
