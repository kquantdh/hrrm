<table style="width:100%" >

    <tbody>
    <tr>
        <th rowspan="2" colspan="8" style="font-weight:bold;font-size:25px;color: #394260;border-bottom-style:none;border-left-style:none;padding:2px;text-align:center"> FUJI
            MACHINE VIETNAM CO., LTD.</th>
    </tr>
    <tr></tr>
    <tr>
        <td rowspan="2" colspan="3"> 1st and
            2nd Floor, 3D Center Building, No.3 Duy Tan,<br>
            Dich Vong Hau Ward, Cau Giay District, Hanoi City, Vietnam</td>
        <th></th>
        <th></th>
        <th style="text-align: right">Phone:</th>

        <th colspan="2">(84-24) 37955323</th>
    </tr>
    <tr>
        <th></th>
        <th></th>

        <th style="text-align: right">Fax :</th>
        <th colspan="2">(84-24) 37955324</th>
    </tr>
    <tr >
        <th colspan="3" style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px">Quotation #: {{$fuji_services->quotation}}</th>
        <th style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px"></th>
        <th style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px"></th>


        <th style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px;text-align: right" >Date: </th>
        <th style="border-top: 1px black dashed;border-bottom:1px black dashed;line-height: 10px" colspan="2"> {{date('d-M-Y')}}</th>
    </tr>


    <tr>
        <th colspan="3">{{$fuji_services->customer->full_name}}</th>
        <th></th>
        <th></th>


        <th style="text-align: right">Valid Until : </th>
        <th colspan="2"> 1 month </th>

    </tr>
    <tr>
        <td rowspan="2" colspan="3"> {{$fuji_services->customer->address}}</td>

        <th></th>
        <th></th>


        <td style="text-align: right"> Payment : </td>
        <td colspan="2"  > 30 Days</td>
    </tr>

    <tr>
    </tr>
    <tr>
        <th colspan="3">ATTN:</th>
        <th></th>
        <th></th>
        <th></th>

        <td> </td>
        <td></td>

    </tr>
    <tr>
        <td colspan="3">TEL:</td>
        <td></td>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr  style="border: none;">
        <th colspan="8">Thank you for showing your interest in Fuji Machines.  We are pleased to quote to you the following for your kind consideration.</th>
    </tr>


    <tr style="border: 1px solid black">
        <th width="1%" style="border: 1px solid black;text-align: center"> No</th>
        <th colspan="4" style="border: 1px solid black; text-align: center"> Description</th>
        <th width="13%"  style="border: 1px solid black;text-align: center">Q'ty<br> Unit</th>
        <th  width="13%"  style="border: 1px solid black;text-align: center">Unit Price <br>(VND)</th>
        <th width="13%" style="border: 1px solid black;text-align: center">Sub Total<br> (VND)</th>
    </tr>




    <tr style="border: 1px solid black">
        <td width="1%" rowspan="12" style="border: 1px solid black;text-align: center"> 1</td>
        <td colspan="4" style="border: none;padding-left: 5px;padding-bottom: 0px; text-align: left">Service charge for repair {{$fuji_services->head_type->name}}{{$fuji_services->head_serial}}</td>
        <td width="13%"rowspan="12"  style="border: 1px solid black;text-align: center"> 1<br>Package</td>
        <td  width="13%" rowspan="12" style="border: 1px solid black;text-align: center">
            {{($fuji_services->head_type->price)+($fuji_services->customer->transport_price)+($fuji_services->part_amount)}}
        </td>
        <td width="13%"rowspan="12" style="border: 1px solid black;text-align: center">
            {{($fuji_services->head_type->price)+($fuji_services->customer->transport_price)}}
        </td>
    </tr>
    <tr style="border: none" >
        <td colspan="4" rowspan="3" style="border: 1px solid black;border-top-style: none;border-bottom-style:none;padding-top: 0px;padding-bottom: 0px; text-align: left;padding-left: 5px;";> Details:<br>{!! $fuji_services->problem!!}</td>
    </tr>
    <tr></tr> <tr ></tr>
    <tr style="border: none;padding-top: 0px">
        <td colspan="4" rowspan="8" style="border: 1px solid black;border-top-style: none;padding-top: 0px; text-align: left;padding-left: 5px"> Job: <br> {!! $fuji_services->problem!!}</td>
    </tr>

     <tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr><tr></tr><tr style="border: 1px solid black">

    </tr>
    <tr>
        <td style="border: 1px solid black;text-align: center" colspan="6">GRAND TOTAL: </td>

        <td  colspan="2" style="border: 1px solid black;text-align: center; color: red;font-weight: bold;font-size: 16px;text-decoration: underline">
            VND : {{number_format(($fuji_services->head_type->price)+($fuji_services->customer->transport_price)+($fuji_services->part_amount)),0,',',','}}
        </td>
    </tr>
    <tr>
        <td  colspan="8" style="border: NONE;text-align: left; color: red;font-weight: bold;font-size: 16px;text-decoration: underline"><br>TERM AND CONDITION</td>
    </tr>
    <tr>
        <td  colspan="8" style="border: NONE;text-align: left;font-weight: bold;text-decoration: underline">General:</td>
    </tr>
    <tr>
        <td  colspan="8" style="border: NONE;text-align: left;padding-left: 20px">
            1 . Normal working hour from 0900 to 1800 hrs, from Mon to Fri, except Publich Holidays.
        </td>
    </tr>
    <tr>
        <td  colspan="8" style="border: NONE;text-align: left;padding-left: 20px">
            2 . The service charge is based on above jobs scope, any other different jobs incurred shall be charged separately
        </td>
    </tr>
    <tr>
        <td  colspan="8" style="border: NONE;text-align: left;padding-left: 20px">
            3 . Consumable parts (if any) listed in this quotation is only used for the mentioned jobs in this quotation. If any others spare parts incurred, we shall quote separately.
        </td>
    </tr>
    <tr>
        <td  colspan="8" style="border: NONE;text-align: left;padding-left: 20px">
            4 . In case the charge in this quotation is defined as "pkg" (package charge), the description of each item shall be explained accordingly.
        </td>
    </tr>
    <tr>
        <td  colspan="8" style="border: NONE;text-align: left;font-weight: bold;text-decoration: underline"colspan="2">Tax:</td>
    </tr>
    <tr>
        <td  colspan="8" style="border: NONE;text-align: left;padding-left: 20px">
            1 .This quotation is not included tax charged by government (if any).
        </td>
    </tr>
    <tr>
        <td  colspan="8" style="border: NONE;text-align: left;padding-left: 20px">
            2 . Customer is required to provide Tax Incentive Certificate to enjoy its tax incentive (if any)<br>
        </td>
    </tr>

    <tr >
        <td rowspan="9"  ></td>
        <td rowspan="9"  ></td>
        <th  width="18%" style="border: 1px solid black;text-align: center" >Prepared by</th>
        <th  width="18%" style="border: 1px solid black;text-align: center" >Checked by</th>
        <th width="23%"style="border: 1px solid black;text-align: center" colspan="2">Approved by</th>
        <td rowspan="9" colspan="2"></td>
    </tr>
    <tr>
        <td style="border: 1px solid black"   rowspan="7"></td>
        <td style="border: 1px solid black"  rowspan="7"> </td>
        <td style="border: 1px solid black;border-bottom-style: none" rowspan="7" colspan="2">
            <a>
                <img src="{{asset('img/FUJI-LOGO.png')}}" alt="logo" class="logo-default" width="160px" height="40px"   >
            </a>
        </td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td style="border: 1px solid black;text-align: center" >Nguyen Thi Hong</td>
        <td style="border: 1px solid black;text-align: center" >Cao Trung Dung</td>
        <td style="border: 1px solid black; border-top-style:none;text-align: center" colspan="2" >

        </td>
    </tr>

    </tbody>
</table>