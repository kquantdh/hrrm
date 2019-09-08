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

    public static function searchAndList($partNo,$name,$description, $start, $length,$column, $sort)
    {
        $query = Part_price_list::select('*');
        if(!empty($partNo)) {
            $query->where('id', 'like', '%' . $partNo . '%');

        }
        if(!empty($name)) {
            $query->where('name', 'like', '%' . $name . '%');

        }
        if(!empty($description)) {
            $query->where('description', 'like', '%' . $description . '%');

        }


        return [
            'count_record' => $query->count(),
            'record' => $query->take(1000)->orderBy($column, $sort)->skip($start)->take($length)->get()
        ];
    }
}
