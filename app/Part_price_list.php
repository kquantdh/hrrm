<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part_price_list extends Model
{
    
    protected $fillable=[
        'id','name','description','rep_new','machine','quantity','price','vn_name','material','detail'
        
    ];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
  
    protected $table = 'part_price_lists';
    public function fujiServiceDetail(){
        return $this->hasMany('App\Fuji_service_detail', 'fuji_service_id', 'id');
    }
}
