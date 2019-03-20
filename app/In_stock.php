<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class In_stock extends Model
{
    protected $table='in_stocks';
    public function user(){
        return  $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function in_stock_detail(){
        return $this->hasMany('App\In_stock_detail', 'in_stock_id', 'id');
    }
}
