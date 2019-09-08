
<div style=" float:left;clear:both;padding-top:20px">
    <a href="index.html">
        <img src="{{asset('img/FUJI-LOGO.png')}}" alt="logo" class="logo-default" width="180px" >
    </a>
</div>
<img src="data:image/png;base64,{!!DNS2D::getBarcodePNG('PR'.str_pad($out_stock->id, 4, '0',STR_PAD_LEFT), 'QRCODE')!!}" alt="barcode" style="width:10%;margin-right:50px;margin-top:0px;float:right"  class="col-md-4"/>
<div style="margin:auto;width:40%;">
    <a style="font-weight:bold;font-size:16px;text-align:center;color: blue;border-style:none">FUJI
        MACHINE VIETNAM CO., LTD.</a><br>
    <a style="color: #394260;font-size:8px;font-weight:bold;text-align:center">
    1st and 2nd Floor, 3D Center Building, No.3 Duy Tan,<br>
    Dich Vong Hau Ward, Cau Giay District, Hanoi City, Vietnam<br>
    Website: https://smt3.fuji.co.jp - Tax Code: 0105983244<br>
    TEL: (84-24) 37955323 FAX: (84-24) 37955324</a>
</div>



        <a style="font-weight:bold;font-size:16px;text-align:center;border-style:none"> @if($out_stock->type_form=='P')
                <div style="margin:auto;width:42%;padding:20px">
                PART REQUISITION FORM
                </div>
            @elseif($out_stock->type_form=='PR')
                <div style="margin:auto;width:65%;padding:20px">
                PART REQUISITION FORM - RECIEPT DELIVERY FORM
                </div>
            @else
                <div style="margin:auto;width:47%;padding:20px">
                PART REQUISITION FORM - LOAN FORM  RECIEPT DELIVERY FORM
                </div>

            @endif
        </a>

<table style="width:100%;font-family: Arial;font-size: 8px;height:5px;border-style: none  ;margin-bottom:15px" >
    <tr style="border-style: none;padding: 0px;margin:0px;width: 12%  ">
        <td style="border-style: none;width: 12%;font-weight:bold  ">Requested By :</td>
        <td style="border-style: none ;width: 28%"> {{$out_stock->user->name}}</td>
        <td style="border-style: none  ;font-weight:bold;width: 20%"></td>
        <td style="border-style: none;font-weight:bold;width: 40% ">Consignee/Delivery Address:</td>
    </tr>
    <tr>
        <td style="border-style: none;font-weight:bold  ">Requested Date : </td>
        <td style="border-style: none;">{{date('d-m-Y',strtotime($out_stock->out_date))}}</td>
        <td style="border-style: none;"></td>
        <td  style="border-style: none ">{{$out_stock->customer->full_name}}</td>

    </tr>
    <tr>
        <td style="border-style: none;font-weight:bold  ">Requested No : </td>
        <td style="border-style: none;">PR{{str_pad($out_stock->id, 4, '0',STR_PAD_LEFT)}}</td>
        <td style="border-style: none "></td>
        <td rowspan="2" style="border-style: none ">{{$out_stock->customer->address}}</td>




    </tr >
    <tr>
        <td style="border-style: none;font-weight:bold  ">Loan time : </td>
        <td style="border-style: none;"> {{$out_stock->loan_date_no}} days</td>
        <td style="border-style: none "></td>


    </tr>
    <tr>
        <td style="border-style: none  "></td>
        <td style="border-style: none;">

        </td>
        <td style="border-style: none "></td>
        <td style="border-style: none "> ATTN : {{$out_stock->customer->person}} </td>
    </tr>
</table>

<table style="width:100%;font-family: Arial;font-size: 8px;border: 1px solid black;border-collapse: collapse">
    <tr style="margin:4px">
        <th>No</th>
        <th>Part No</th>
        <th >Part Name</th>
        <th>Barcode</th>
        <th >Q'ty</th>
        <th>Location</th>
        <th>Belong to</th>
        <th>Remark</th>
    </tr>
    @if(isset($list))
    @foreach($list as $key=> $item)
        <tr class="odd gradeX">
            <td>{{$key+1}}  </td>                                        
            <td>{{$item->in_stock_detail->part_name}}</td>
            <td>{{$item->in_stock_detail->part_id}}</td>
            <td>{{$item->barcode}}</td>
            <td>{{$item->out_quantity}}</td>
            <td>{{$item->in_stock_detail->location}}</td>
            <td>{{$item->in_stock_detail->belongto}}</td>
            <td>{{$item->remark}}</td>
            
        </tr>
    @endforeach
@endif
</table>
    @if($out_stock->type_form=='PLR')
        <p style="width:100%;font-family: Arial;font-size: 8px; font-weight: bold">Country of Origin : Japan </p>
        <p style="width:100%;font-family: Arial;font-size: 8px;">1 .<a style="font-weight:bold">{{$out_stock->customer->full_name}}</a> shall bear all risks of destruction,
            deterioration, accidental and total loss during the on loan period.</p>
        <p style="width:100%;font-family: Arial;font-size: 8px;"> 2. <a style="font-weight:bold">{{$out_stock->customer->full_name}}</a> shall be responsible for all logistics expenses (incl. Insurance) from FMV unitl delivery
            to <a style="font-weight:bold">{{$out_stock->customer->full_name}}</a>. And <a style="font-weight:bold">{{$out_stock->customer->full_name}}</a> shall notify FMA if the loan items
            are defective in any way, or loan item does not conform to this agreement. In case loan items are returned to FMA, all of the transportation
            and insurance costs are also responsible by <a style="font-weight:bold">{{$out_stock->customer->full_name}}</a>.</p>
        <p style="width:100%;font-family: Arial;font-size: 8px;"> 3. <a style="font-weight:bold">{{$out_stock->customer->full_name}}</a> confirms to insure all loan items against any damages including fire, flood and any kinds of acccident
            during the loan period.</p>
        <p style="width:100%;font-family: Arial;font-size: 8px;"> 4. <a style="font-weight:bold">{{$out_stock->customer->full_name}}</a> shall held liable for damages during
        transportation and handling.</p>
        <p style="width:100%;font-family: Arial;font-size: 8px;"> 5. Without prior consent of the owner, <a style="font-weight:bold">{{$out_stock->customer->full_name}}</a> shall not be
        authorized to permit the use of the Consigned / Loan object by third parties, especially not to sublet
        the Consign object.</p>
        <p style="width:100%;font-family: Arial;font-size: 8px;"> 6. In case the loan items are being decided to be purchased by <a style="font-weight:bold">{{$out_stock->customer->full_name}}</a>, the costs shall be discussed seperately.
            Anything which is not stipulated in this agreement shall be discussed and settled by both parties appropriately.
        </p>
    @else
    <br>

    @endif
   

<table style="width:100%;font-family: Arial;font-size: 8px;border-style: none  ;margin-bottom:15px" >
    <tr>
        <th style="width: 19%  ">Prepared By :</th>
        <th style="  width: 19%"> Check By</th>
        <th style=" width: 19%"> Delivery By</th>
        <th style="border-style: none;width: 15%"></th>
        <th style="width: 28% "> Recieved By ({{$out_stock->customer->name}})</th>
    </tr>
    <tr>
        <td rowspan="5" style="height: 30px" ></td>
        <td rowspan="5" > </td>
        <td rowspan="4" > </td>
        <td rowspan="4" style="border-style: none;"></td>
        <td rowspan="4" > </td>
    </tr>
    <tr> </tr>
    <tr> </tr>
    <tr> </tr>

    <tr>
        <td > Name :</td>
        <td style="border-style: none;"></td>
        <td > Name :</td>
    </tr>
    <tr>
        <td>Name : {{$out_stock->user->name}}</td>
        <td > Name : {{$out_stock->user->name}}</td>
        <td> Date :</td>
        <td style="border-style: none;"></td>
        <td > Date </td>
    </tr>

</table>
