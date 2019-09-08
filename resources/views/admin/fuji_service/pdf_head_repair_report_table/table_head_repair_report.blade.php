<table style="width:100%;font-family: Arial;font-size: 15px;border: 1px solid black;border-collapse:collapse">
    <tr>
        <td rowspan="5" style="border-style:none"><img src="{{asset('img/FUJI-LOGO.png')}}" alt="logo" class="logo-default" height="40px" style="text-align: right"  ></td>
        <td colspan="4" style="font-weight:bold;font-size:25px;color: #394260;border-bottom-style:none;border-left-style:none;padding:2px;text-align:center ">
            FUJI MACHINE VIETNAM CO., LTD.</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="3" style="color: #394260;font-weight:bold; padding-left:30px;border-bottom-style:none;border-left-style:none;border-top-style:none;text-align: left">
            1st and 2nd Floor, 3D Center Building, No.3 Duy Tan,<br>
            Dich Vong Hau Ward, Cau Giay District, Hanoi City, Vietnam<br>
            Website: https://smt3.fuji.co.jp - Tax Code: 0105983244<br>
            TEL: (84-24) 37955323 FAX: (84-24) 37955324
        </td>
    </tr>
    <tr> </tr>
    <tr></tr>





    <tr>
        <td colspan="4" style="font-weight:bold;font-size:25px;border-style:none;text-align: left">HEAD REPAIR REPORT</td>
    </tr>

    <tr>
        <td colspan="5" style="font-weight:bold;background-color:#f2f2f2">A. HEAD AND ENGINEER INFORMATION</td>
    </tr>
    <tr>
        <td>Customer</td>
        <td>{{$fuji_service->customer->name}}</td>
        <td></td>
        <td>HRR No:</td>
        <td>HRR{{ date('y', strtotime($fuji_service->created_at))}}{{str_pad($fuji_service->id, 4, '0',STR_PAD_LEFT)}}</td>
    </tr>
    <tr>
        <td>Head Type:</td>
        <td>{{$fuji_service->head_type->name}}</td>
        <td>-</td>
        <td>Done by:</td>
        <td>{{$fuji_service->engineer_name}}</td>
    </tr>
    <tr>
        <td>Head SNo.:</td>
        <td>{{$fuji_service->head_serial}}</td>
        <td>-</td>
        <td>Date</td>
        <td>{{ date( "d-M-Y", strtotime( $fuji_service->fuji_service_time_detail->date_time_sr_start ) )}}</td>
    </tr>

    <tr>
        <td colspan="5" style="font-weight:bold;background-color:#f2f2f2">B. JOB DETAIL</td>
    </tr>
    <tr>
        <td rowspan="3">Problem:</td>
        <td rowspan="3" colspan="4">{!!$fuji_service->problem!!}</td>

    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td rowspan="6">Repair details:</td>
        <td rowspan="6" colspan="4">{!!$fuji_service->countermeasure!!}</td>

    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="5" style="font-weight:bold;background-color:#f2f2f2">C. REPLACEMENT PART</td>
    </tr>
    <tr>
        <td> No. Part number</td>
        <td>Part name</td>
        <td>Description</td>
        <td>Q'ty</td>
        <td>Remark</td>
    </tr>
    @foreach($list as $key=>$it)
        <tr>
            <td style="margin-left: 20px">{{str_pad($key+1,2, '0',STR_PAD_LEFT)}}. {{$it->part_id}} </td>
            <td>{{$it->name}} </td>
            <td></td>
            <td>{{$it->quantity}}</td>

            <td></td>
        </tr>
    @endforeach

    <tr>
        <td colspan="5" style="font-weight:bold;border-style:none"><br>D. FUNCTIONALITY CHECK</td>
    </tr>
    <tr>
        <td colspan="3">Test Conducted</td>
        <td style="text-align: center">Status</td>
        <td style="text-align: center">Personel</td>
    </tr>
    <tr>
        <td>Auto Calibration</td>
        <td colspan="2">- Run auto calibration</td>
        <td style="text-align: center">Good</td>
        <td style="text-align: center">{{$fuji_service->engineer_name}}</td>
    </tr>
    <tr>
        <td>Holders & Gear smooth</td>
        <td colspan="2">- Check all holder & gear movement or no abnormal sound</td>
        <td style="text-align: center">Good</td>
        <td style="text-align: center"></td>
    </tr>
    <tr>
        <td>Nozzle check sensor</td>
        <td colspan="2">- Nozzle check sensor alighment(if applicable)</td>
        <td style="text-align: center">Good</td>
        <td style="text-align: center"></td>
    </tr>
    <tr>
        <td>IPS</td>
        <td colspan="2">- IPS function (if applicable)</td>
        <td style="text-align: center">Good</td>
        <td style="text-align: center"></td>
    </tr>
    <tr>
        <td>Auto Backup Pin</td>
        <td colspan="2">- Test auto backup pin function (if applicable)</td>
        <td style="text-align: center">Good</td>
        <td style="text-align: center"></td>
    </tr>
    <tr>
        <td>Touch sensor</td>
        <td colspan="2">- Test all touch sensor of head (if applicable)</td>
        <td style="text-align: center">Good</td>
        <td style="text-align: center"></td>
    </tr>
    <tr>
        <td>Part drop sensor</td>
        <td colspan="2">- Test all part drop sensor of head (if applicable)</td>
        <td style="text-align: center">Good</td>
        <td style="text-align: center"></td>
    </tr>
    <tr>
        <td>Idle Run/VT253 idle</td>
        <td colspan="2">- Run Idle the placing head (VT253 idle with POP head)</td>
        <td style="text-align: center">Good</td>
        <td style="text-align: center"></td>
    </tr>
    <tr>
        <td>Placement test</td>
        <td colspan="2">- Production using Fuji 96-001 board on double side tape</td>
        <td style="text-align: center">Good</td>
        <td style="text-align: center"></td>
    </tr>
    <tr>
        <td>Pam test</td>
        <td colspan="2"- Perform PAM test></td>
        <td style="text-align: center">Good</td>
        <td style="text-align: center"></td>
    </tr>
</table>