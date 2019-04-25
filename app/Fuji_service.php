<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuji_service extends Model
{
    protected $fillable=[
        'job_subject','customer_id','job_type','quotation','po','sr_no','invoice','head_type_id','head_serial','nature_service',
        'status','entry','discount','discount_part','normal_hrs','night_hrs','off_hrs','holiday_hrs','person_amount','problem','countermeasure'

    ];
    public function head_type(){

        return $this->belongsTo('App\Head_type');
    }
    public function customer(){
        return $this->belongsTo('App\Customer');
    }

}
