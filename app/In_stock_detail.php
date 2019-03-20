<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class In_stock_detail extends Model
{
    protected $table='in_stock_details';
    public function in_stock(){
    	return $this->belongsTo('App\In_stock', 'in_stock_id', 'id');
    }

    public function part_price_list(){
    	return $this->belongsTo('App\Part_price_list', 'part_id', 'id');
    }
    
}
