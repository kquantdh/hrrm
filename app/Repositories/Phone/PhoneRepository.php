<?php
namespace  App\Repositories\Phone;

use App\Out_stock;
use App\Out_stock_detail;
use App\In_stock_detail;
use Session;
use Auth;

class PhoneRepository implements  PhoneRepositoryInterface
{
    public function all()
    {
        return Phone::all();
    }

    public function save($data)
    {
        $phone =  new Out_stock();
        if (isset($data['phone'])) {
            $phone->phone=$data['phone'];
        }
        if (isset($data['type'])) {
            $phone->type=$data['type'];
        }
        if (isset($data['money'])) {
            $phone->money=$data['money'];
        }
        if (isset($data['created_user'])) {
            $phone->created_user=$data['created_user'];
        }
        if (isset($data['status'])) {
            $phone->status=$data['status'];
        }
         $phone->save();
    }

    public function update($id, $data)
    {

    }


    public function change_status($id, Request $request)
    {

        $out_stocks = Out_stock::findOrFail($id);
        $status_old = $out_stocks->status;
        $out_stocks->status = $request->status;
        $out_stock_details = Out_stock_detail::where('out_stock_id', $id)->get();
        $is_ok=0;
        foreach ($out_stock_details as $item){
            $temp_ = In_stock_detail::where('barcode', $item->barcode)->first();
            if ($temp_->balance< $item->out_quantity){
                $is_ok=1;
            }
        }



        foreach ($out_stock_details as $item) {
            if ($out_stocks->status == 4 && $out_stocks->status != $status_old && $status_old!=5&&$is_ok==0) {

                $product = In_stock_detail::where('barcode', $item->barcode)->first();
                $out_stock_details = Out_stock_detail::where('barcode', $item->barcode)->where('out_stock_id',$out_stocks->id)->first();
                $product->balance = $product->balance - $item->out_quantity;
                $out_stock_details->status =$request->status;
                $out_stocks = Out_stock::findOrFail($id);
                if (Auth::check()) {
                    $out_stocks->user_id = Auth::user()->id;
                } else {
                    $out_stocks->user_id = null;
                }
                $out_stocks->status = $request->status;
                Session::flash('success', 'Changed to take out successfull!');
                $out_stocks->save();
                $product->save();
                $out_stock_details->save();

            }elseif($out_stocks->status == 5 && $status_old  ==4 && Auth::user()->group_id==1 &&$out_stocks->type_form!='PR' ){
                $product = In_stock_detail::where('barcode', $item->barcode)->first();
                $out_stock_details = Out_stock_detail::where('barcode', $item->barcode)->where('out_stock_id',$out_stocks->id)->first();
                $product->balance = $product->balance + $item->out_quantity;
                $out_stock_details->status =5;
                $out_stocks = Out_stock::findOrFail($id);
                if (Auth::check()) {
                    $out_stocks->return_user_id = Auth::user()->id;
                } else {
                    $out_stocks->return_user_id = null;
                }

                $out_stocks->status = $request->status;
                $out_stocks->return_date = date('Y-m-d');
                $out_stocks->save();
                $product->save();
                $out_stock_details->save();
                Session::flash('success', 'Changed to returned successfull!');
            }else{
                Session::flash('fail', 'You can not change status. Please check quantity or status or access permission or type form PR!');
            }
        }
        return redirect('admin/outstock');
    }

    public function delete($id)
    {
        $phone = Out_stock::find($id);
        if ($phone) {
            return $phone->delete();
        } else {
            return false;
        }
    }
    public function  find($id)
    {
       return Out_stock::find($id);
    }
    public function searchAndList( $status, $phone)
    {
        $query = Out_stock::select('*')
                    ->where('status','<>',4)
                    ->where('status','<>',2);
        if($status!=999) {
            $query->where('status', $status);
        }
        if(!empty($phone)) {
            $query->where('phone', 'like', '%'.$phone.'%');
        }
        return $query->orderBy('id', 'DESC')->get();
    }

    public function  getOutStockDetail($id)
    {
            $out_stock_details = Out_stock_detail::where('out_stock_id', $id)->get();

            return $out_stock_details;

    }
    public function  getInStockDetail($barcode)
    {
        $in_stock_details = In_stock_detail::where('barcode', $barcode)->first();

        return $in_stock_details;

    }

    public function  getPhoneForMoney($money)
    {
        $phoneUT = Out_stock::select('id','phone', 'money', 'money_change', 'status')
            ->where(\DB::raw('money-money_change'), '>=', $money)
            ->whereIn('status', [3])
            ->orderBy(\DB::raw('RAND()'))
            ->first();
           if ($phoneUT) {
               return $phoneUT;
           }else {
               $phone = Out_stock::select('id','phone', 'money', 'money_change', 'status')
                   ->where(\DB::raw('money-money_change'), '>=', $money)
                   ->whereIn('status', [0, 1])
                   ->orderBy(\DB::raw('RAND()'))
                   ->first();
               return $phone;
           }
    }

    public  function  countPhoneNow()
    {
        return Out_stock::select(\DB::raw('count(id) as count_phone, sum(if(status=0,1,0)) as phone_new,
                sum(if(status=1,1,0)) as phone_start, sum(if(status=2,1,0)) as phone_success,sum(if(status=-1,1,0)) as phone_stop'))
            ->first();
    }
}

?>

