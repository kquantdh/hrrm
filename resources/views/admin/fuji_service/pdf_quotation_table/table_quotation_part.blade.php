<table style="width:100%" >

    <tbody>
    <tr>
        <th rowspan="2" colspan="10" style="font-weight:bold;font-size:25px;color: #394260;border-bottom-style:none;border-left-style:none;padding:2px;text-align:center"> Fuji Machine Asia Pte Ltd</th>
    </tr>
    <tr></tr>
    <tr>
        <td rowspan="2" colspan="3"> 51, Ubi Avenue 1, #01-24 Paya Ubi<br>
            Industrial Park, Singapore 408933</td>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th> PHONE:</th>
        <th colspan="2">(65) 6746 4966</th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>FAX :</th>
        <th colspan="2">(65) 6841 2326</th>
    </tr>
    <tr>
        <td colspan="3">CO REG NO:</td>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <td >GST NO:</td>
        <td colspan="3">2019267374</td>

    </tr>


    <tr >
        <th colspan="3" style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px">Quotation #: {{$fuji_services->quotation}}</th>
        <th style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px"></th>
        <th style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px"></th>
        <th style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px"></th>
        <th style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px"></th>
        <th style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px">Date: </th>
        <th colspan="2" style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px"> {{date('d-M-Y')}}</th>
    </tr>


    <tr>
        <th colspan="3">{{$fuji_services->customer->full_name}}</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>Valid Until : </th>
        <th colspan="2"> 1 month </th>

    </tr>
    <tr>
        <td rowspan="2" colspan="2"> {{$fuji_services->customer->address}}</td>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <td> Payment:</td>
        <td colspan="2"> 30 Days</td>
    </tr>

    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <td >MOD:</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <th colspan="3">ATTN:</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <td>Term: </td>
        <td colspan="2">EXWORK SINGAPORE </td>

    </tr>
    <tr>
        <td colspan="3">TEL:</td>
        <td></td>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>


    </tr>
       <tr  style="border: 1px black solid;line-height: 10px;font-size: 12px">
        <th rowspan="2" style="width: 3%;padding-left:5px;border: 1px black solid;border-collapse:collapse">No</th>
        <th rowspan="2" style="width: 20%;padding-left:5px;border: 1px black solid;border-collapse:collapse"> Part Number </th>
        <th rowspan="2" style="width: 22%;padding-left:5px;border: 1px black solid;border-collapse:collapse"> Part Name</th>
        <th rowspan="2" style="width: 5%;padding-left:5px;border: 1px black solid;border-collapse:collapse"> Q'ty</th>
        <th rowspan="2" style="width: 5%;padding-left:5px;border: 1px black solid;border-collapse:collapse"> Unit</th>
        <th rowspan="2"style="width: 10%;padding-left:5px;border: 1px black solid;border-collapse:collapse"> Unit Price</th>
        <th rowspan="2"style="width: 7%;padding-left:5px;border: 1px black solid;border-collapse:collapse"> Discount </th>
        <th rowspan="2" style="width: 10%;padding-left:5px;border: 1px black solid;border-collapse:collapse"> Amount</th>
        <th rowspan="2" style="width: 10%;padding-left:5px;border: 1px black solid;border-collapse:collapse"> Sub-Total </th>
        <th rowspan="2" style="width: 20%;padding-left:5px;border: 1px black solid;border-collapse:collapse"> Lead time </th>
    </tr>
    <tr></tr>

    @foreach($fuji_service_details as $key=> $list)
        <tr>
            <td style="text-align: center">{{($key++)+1}}</td>
            <td style="padding-left:5px;">{{$list->part_id}}</td>
            <td style="padding-left:5px">{{$list->name}}</td>
            <td style="text-align: right">{{$list->quantity}}</td>
            <td style="text-align: right">PC</td>
            <td style="text-align: right">{{number_format($list->price*$fuji_services->customer->jpy_rate,0,',',',')}}</td>
            <td style="text-align: right">{{number_format($fuji_services->discount_part,0,',',',')}}%</td>
            <td style="text-align: right">{{number_format($fuji_services->discount_part*$list->price,0,',',',')}}</td>
            <td style="text-align: right">{{number_format($list->quantity*$list->price*$fuji_services->customer->jpy_rate*(1-($fuji_services->discount_part/100)),0,',',',')}}</td>
            <td style="text-align: right"> 6-8 weeks</td>


    @endforeach
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="4">---------------------------------------------------------------</th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2" style="text-align: right">TOTAL JPY: </th>
        <th></th>
        <th style="text-align: right">{{number_format(($fuji_services->part_amount_jpy),0,',',',')}}</th>
        <th></th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2" style="text-align: right">Total Discount: </th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2" style="text-align: right">Discount for Spares: </th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2" style="text-align: right">Export, Handling: </th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2" style="text-align: right">OUT OF SCOPE: </th>
        <th></th>
        <th></th>
        <th></th>
    </tr>

    <tr>
        <th class="dot"></th>
        <th style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px"></th>
        <th style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px"></th>
        <th style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px"></th>
        <th colspan="2" style="font-size: 14px;color: red;border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px">TOTAL JPY: </th>
        <th style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px"></th>
        <th style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px"></th>
        <th style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px"></th>
        <th style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px"></th>
    </tr>


    <tr>
        <TD colspan="10">THIS QUOTATION IS SUBJECT TO THE GENERAL TERMS AND CONDITION OF SALE ATTACHED</TD>
    </tr>
    <tr>
        <TD colspan="10">** THIS QUOTATION IS BASED ON FOB SINGAPORE TERMS (VIA AIR SHIPMENT)</TD>
    </tr>
    <tr>
        <td colspan="10">** PLEASE ISSUE PO AS PER THIS QUOTATION. IF THERE IS ANY AMENDMENT ON QUANTITY,</td>
    </tr>
    <tr>
        <td colspan="10">DO REQUEST FOR A NEW QUOTATION AS THIS QUOTE WILL BE VOID IF ITEMS AND QUANTITY CHANGES.</td>
    </tr>
    <tr>
        <td colspan="10">** 1 LOT SHIPMENT FOR PER QUOTATION.</td>
    </tr>
    <tr>
        <td colspan="10">** IN CASE OF BIG / BULKY ITEMS, SPECIAL HANDLING CHARGE MAY BE INCURRED.</td>
    </tr>
    <tr>
        <td colspan="10">** THE LEAD-TIME IS CALCULATED FROM THE SALES ORDER CONFIRMATION DATE.</td>
    </tr>


    <tr>
        <td colspan="10" style="background-color: yellow">THIS IS STANDARD LEAD TIME , SOME ITEMS MAY NEED LONGER LEAD TIME THAN USUAL. <br>
            WE WILL INFORM THE EXW-FMA DATE AFTER RECEIVE YOUR ORDER.</td>
    </tr>
    </tbody>
</table>