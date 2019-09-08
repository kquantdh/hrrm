<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuji_service_detail extends Model
{
    protected $table='fuji_service_details';
    public function fuji_service(){
    	return $this->belongsTo('App\Fuji_service', 'fuji_service_id', 'id');
    }

    public function part_price_list(){
    	return $this->belongsTo('App\Part_price_list', 'part_id', 'id');
    }
    //hàm làm tròn đến chục nghìn
    public function roundUpToNearestTenThousand($n)
    {
        return (int) (10000 * ceil($n/10000));
    }
    //hàm làm tròn đến hàng nghìn
    public function roundUpToNearestThousand($n)
    {
        return (int) (1000 * ceil($n/1000));
    }

    //Làm tròn đến hàng trăm
    public function roundUpToNearestHundred($n)
    {
        return (int) (100 * ceil($n/100));
    }
    //hàm làm tròn đến chục
    public function roundUpToNearestTen($n)
    {
        return (int) (10 * ceil($n/10));
    }
    //hàm làm tròn đến đơn vị
    public function roundUpToNearest($n)
    {
        return (int) (1 * ceil($n/1));
    }

}
