<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Out_stock_detail extends Model
{
    protected $table='out_stock_details';
    public function out_stock(){
    	return $this->belongsTo('App\Out_stock', 'out_stock_id', 'id');
    }

    public function in_stock_detail(){
    	return $this->belongsTo('App\In_stock_detail', 'barcode', 'barcode');
    }
    public function user(){
        return  $this->belongsTo('App\User', 'user_id', 'id');
    }

    
}
