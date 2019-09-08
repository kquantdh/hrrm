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
    public static function searchAndList($status,$userOut,$userReturn,$partOutNo,$customer,$typeForm,$dateFrom,$dateTo,$start, $length,$column, $sort)
    {
        $query = Out_stock::join( 'users as au','out_stocks.user_id','=','au.id')
           -> join( 'users as cu','out_stocks.return_user_id','=','cu.id')
            -> join( 'customers','out_stocks.customer_id','=','customers.id')
            ->select(['out_stocks.*','au.name as user_name','cu.name as return_user_name','customers.name as customer_name'])


        ;
        if(!empty($dateFrom)) {
            $query->where(\DB::raw('out_stocks.out_date'),'>=', $dateFrom);
        }
        if(!empty($dateTo)) {
            $query->where(\DB::raw('out_stocks.out_date'),'<=', $dateTo);
        }
        if(!empty($status)) {
        $query->where('status', 'like', '%' . $status . '%');
        }
        if(!empty($userOut)) {
            $query->where('au.name', 'like', '%' . $userOut . '%');
        }
        if(!empty($userReturn)) {
            $query->where('cu.name', 'like', '%' . $userReturn . '%');
        }
        if(!empty($partOutNo)) {
            $query->where('out_stocks.id', 'like', '%' . $partOutNo . '%');
        }
        if(!empty($customer)) {
            $query->where('customers.name', 'like', '%' . $customer . '%');
        }
        if(!empty($typeForm)) {
            $query->where('type_form', 'like', '%' . $typeForm . '%');
        }

        return [
            'count_record' => $query->count(),
            'record' => $query->take(1000)->orderBy($column, $sort)->skip($start)->take($length)->get()
        ];
    }

}
