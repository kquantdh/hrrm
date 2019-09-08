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
    public static function searchAndList($inv_no,$name1,$po,$remark,$dateFrom,$dateTo,$start, $length,$column, $sort)
    {
        $query = In_stock::join( 'users','in_stocks.user_id','=','users.id')->select(['in_stocks.*','users.name']);



        if(!empty($dateFrom)) {
            $query->where(\DB::raw('in_stocks.in_date'),'>=', $dateFrom);
        }
        if(!empty($dateTo)) {
            $query->where(\DB::raw('in_stocks.in_date'),'<=', $dateTo);
        }
        if(!empty($inv_no)) {
            $query->where('inv_no', 'like', '%' . $inv_no . '%');
        }
        if(!empty($name1)) {
            $query->where('users.name', 'like', '%' . $name1 . '%');
        }
        if(!empty($po)) {
            $query->where('po_no', 'like', '%' . $po . '%');
        }
        if(!empty($remark)) {
            $query->where('remark', 'like', '%' . $remark . '%');
        }


        return [
            'count_record' => $query->count(),
            'record' => $query->take(1000)->orderBy($column, $sort)->skip($start)->take($length)->get()
        ];
    }


}
