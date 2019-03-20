<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuji_service extends Model
{
    public function head_type(){

        return $this->belongsTo('App\Head_type');
    }
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
    
}
