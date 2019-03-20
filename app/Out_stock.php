<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Out_stock extends Model
{
    public function user(){
        return  $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function in_user(){
        return  $this->belongsTo('App\User', 'return_user_id', 'id');
    }
    public function customer(){
        return $this->belongsTo('App\Customer');
    }

    public function get_statuses(){
        return array(
            
            3 => 'Processing',
            4 => 'Take out',
            5 => 'Returned'
        );
    }

    public function status_name(){
        $statuses = $this->get_statuses();
        return $statuses[$this->status];
    }

}
