<table style="width:100%;font-family: Arial;font-size: 15px;border: 1px solid black;border-collapse: collapse">
    <tr>
        <td rowspan="4"><div style="text-align: center">
                <a href="{{url('/admin/outstock')}}">
                    <img src="{{asset('img/FUJI-LOGO.png')}}" alt="logo" class="logo-default" width="120px" height="35px"    >
                </a>
            </div></td>
        <td colspan="5" style="font-weight:bold;font-size:20px;text-align:center;color: #394260;border-style:none">FUJI
            MACHINE VIETNAM CO., LTD.</td>
        
        <td colspan="2">SR No : {{ $fuji_service->sr_no }}</td>
    </tr>
    <tr>
        <td colspan="5" rowspan="3" style="color: #394260;font-size:12px;font-weight:bold; padding-left:5px;border-style:none">1st and
            2nd Floor, 3D Center Building, No.3 Duy Tan,<br>
            Dich Vong Hau Ward, Cau Giay District, Hanoi City, Vietnam<br>
            Website: https://smt3.fuji.co.jp - Tax Code: 0105983244<br>
            TEL: (84-24) 37955323 FAX: (84-24) 37955324</td>
        
        <td colspan="2">Inv No : {{ $fuji_service->invoice }}</td>
    </tr>
    <tr>
        
        <td colspan="2">PO No : {{ $fuji_service->po }}</td>
    </tr>
    <tr>
        @if(!empty($fuji_service->fuji_service_time_detail->date_time_sr_start))
            <td colspan="2">Date : {{ date( "d-M-Y", strtotime( $fuji_service->fuji_service_time_detail->date_time_sr_start ) )}}</td>
        @else
            <td colspan="2">Date:</td>
        @endif

    </tr>
    <tr>
        <td colspan="8" style="font-weight:bold;font-size:20px;text-align:center">SERVICE REPORT</td>
    </tr>

    <tr>
        <td colspan="8" style="font-weight:bold;background-color:#f2f2f2">A. CUSTOMER</td>
    </tr>
    <tr>
        <td style="width: 12%">Name:</td>
        <td colspan="4">{{ $fuji_service->customer->full_name }}</td>
        
        <td>Site:</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td>Address:</td>
        <td colspan="7">{{ $fuji_service->customer->address }}</td>
    <tr>
        <td>Telephone:</td>
        <td colspan="4">{{ $fuji_service->customer->mobile }}</td>
        <td>Contact Person:</td>
        <td colspan="2">{{ $fuji_service->customer->person }}</td>
    </tr>
    <tr>
        <td>Tax code:</td>
        <td colspan="4">{{ $fuji_service->customer->tax }}</td>
        <td colspan="3">Jabil</td>
    </tr>
    <tr>
        <td colspan="8" style="font-weight:bold;background-color:#f2f2f2">B. EQUIPMENT DETAIL</td>
    </tr>
    <tr>
        <td>Model:</td>
        <td colspan="4">NXT III</td>
        <td>Serial No.:</td>
        <td colspan="2">M63S 1123</td>
    </tr>
    <tr>
        <td>Mfg. Date:</td>
        <td colspan="4">1-Jun-12</td>
        <td>Line Name.:</td>
        <td colspan="2">E</td>
    </tr>
    <tr>
        <td>Software Ver.:</td>
        <td colspan="4">6.01</td>
        <td>Module No.:</td>
        <td colspan="2">1</td>
    </tr>
    <tr>
        <td>M/C Serial No.:</td>
        <td colspan="4">SD0073189</td>
        <td>Module S/N:</td>
        <td colspan="2">---</td>
    </tr>
    <tr>
        <td colspan="8" style="font-weight:bold;background-color:#f2f2f2">C. JOB TITLE</td>
    </tr>
    <tr>
        <td style="border-right-style:none">Installation:</td>
        <td style="border-left-style:none">No</td>
        <td style="border-right-style:none">Repair:</td>
        <td style="border-left-style:none">No</td>
        <td style="border-right-style:none">Calibration:</td>
        <td style="border-left-style:none">No</td>
        <td style="border-right-style:none">Warranty:</td>
        <td style="border-left-style:none">No</td>
    </tr>
    <tr>
        <td style="border-right-style:none">Contract:</td>
        <td style="border-left-style:none">No</td>
        <td style="border-right-style:none">Prevent Maint:</td>
        <td style="border-left-style:none">No</td>
        <td style="border-right-style:none">Delivery:</td>
        <td style="border-left-style:none">No</td>
        <td style="border-right-style:none">Others:</td>
        <td style="border-left-style:none">No</td>
    </tr>
    <tr>
        <td rowspan="2">Symptoms:</td>
        <td colspan="7" rowspan="2">{!!$fuji_service->sr_no." ".$fuji_service->job_subject !!}</td>
    </tr>
    <tr>
            
    </tr>     


    <tr>
        <td colspan="8" style="font-weight:bold;background-color:#f2f2f2">D. JOB PERFORMED</td>
    </tr>
    <tr>
        <td>Job status:</td>
        <td colspan="7">Complete</td>
    </tr>

    <tr>
        <td rowspan="1">Comments:</td>
        <td colspan="7">{!!$fuji_service->countermeasure !!}</td>
    </tr>
    
    <tr>
        <td>Recommendation:</td>
        <td colspan="7">-</td>
    </tr>


    <tr>
        <td colspan="4" style="font-weight:bold;background-color:#f2f2f2">E. CUSTOMER ACCEPTANCE</td>
        <td colspan="4" style="font-weight:bold;background-color:#f2f2f2">F. SERVICE BY</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="5" style="border-right-style:none"><br><br><br><br><br></td>
        <td colspan="4" rowspan="5" style="border-left-style:none"></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>

    <tr>
        <td colspan="2">Signature</td>
        <td colspan="3">Co. Stamp</td>
        
        <td colspan="3">Name : {{$fuji_service->engineer_name}}</td>
    </tr>
    <tr>
        <td colspan="2">Name:</td>
        <td colspan="3">Date:</td>
        @if(!empty($fuji_service->fuji_service_time_detail->date_time_sr_start))
            <td colspan="3">Date : {{ date( "d-M-Y", strtotime( $fuji_service->fuji_service_time_detail->date_time_sr_end ) )}}</td>
        @else
            <td colspan="3">Date:</td>
        @endif
        

    </tr>


    <tr>
        <td colspan="8" style="font-weight:bold;background-color:#f2f2f2">G. PART/LABOR CHARGE</td>
    </tr>
    <tr>
        <td>Item No.</td>
        <td>Description</td>
        <td colspan="2">Qty Unit Price</td>
        <td>Date From</td>
        <td>Time From</td>
        <td>Date To</td>
        <td>Time To</td>
    </tr>

    <tr>
        <td colspan="4" rowspan="16"></td>
        @if(!empty($fuji_service->fuji_service_time_detail->date_time_1_from))
        <td>{{ date( "d-M-Y", strtotime( $fuji_service->fuji_service_time_detail->date_time_1_from ) )}}</td>
        @else
        <td> </td>
        @endif
        @if(!empty($fuji_service->fuji_service_time_detail->date_time_1_from))
            <td>{{ date( "h:i", strtotime( $fuji_service->fuji_service_time_detail->date_time_1_from ) )}}</td>
        @else
            <td> </td>
        @endif
        @if(!empty($fuji_service->fuji_service_time_detail->date_time_1_to))
            <td>{{ date( "d-M-Y", strtotime( $fuji_service->fuji_service_time_detail->date_time_1_to ) )}}</td>
        @else
            <td> </td>
        @endif
        @if(!empty($fuji_service->fuji_service_time_detail->date_time_1_to))
            <td>{{ date( "h:i", strtotime( $fuji_service->fuji_service_time_detail->date_time_1_to ) )}}</td>
        @else
            <td> </td>
        @endif

    </tr>

    @if(!empty($fuji_service->fuji_service_time_detail->date_time_1_from))
    <tr>
        <td>{{ date( "d-M-Y", strtotime( $fuji_service->fuji_service_time_detail->date_time_2_from ) )}}</td>
        <td>{{ date( "h:i", strtotime( $fuji_service->fuji_service_time_detail->date_time_2_from ) )}}</td>
        <td>{{ date( "d-M-Y", strtotime( $fuji_service->fuji_service_time_detail->date_time_2_to ) )}}</td>
        <td>{{ date( "h:i", strtotime( $fuji_service->fuji_service_time_detail->date_time_2_to ) )}}</td>
    </tr>
    @endif
    @if(!empty($fuji_service->fuji_service_time_detail->date_time_1_from))
    <tr>
        <td>{{ date( "d-M-Y", strtotime( $fuji_service->fuji_service_time_detail->date_time_3_from ) )}}</td>
        <td>{{ date( "h:i", strtotime( $fuji_service->fuji_service_time_detail->date_time_3_from ) )}}</td>
        <td>{{ date( "d-M-Y", strtotime( $fuji_service->fuji_service_time_detail->date_time_3_to ) )}}</td>
        <td>{{ date( "h:i", strtotime( $fuji_service->fuji_service_time_detail->date_time_3_to ) )}}</td>
    </tr>
    @endif
    @if(!empty($fuji_service->fuji_service_time_detail->date_time_1_from))
    <tr>
        <td>{{ date( "d-M-Y", strtotime( $fuji_service->fuji_service_time_detail->date_time_4_from ) )}}</td>
        <td>{{ date( "h:i", strtotime( $fuji_service->fuji_service_time_detail->date_time_4_from ) )}}</td>
        <td>{{ date( "d-M-Y", strtotime( $fuji_service->fuji_service_time_detail->date_time_4_to ) )}}</td>
        <td>{{ date( "h:i", strtotime( $fuji_service->fuji_service_time_detail->date_time_4_to ) )}}</td>
    </tr>
    @endif
    @if(!empty($fuji_service->fuji_service_time_detail->date_time_1_from))
    <tr>
        <td>{{ date( "d-M-Y", strtotime( $fuji_service->fuji_service_time_detail->date_time_5_from ) )}}</td>
        <td>{{ date( "h:i", strtotime( $fuji_service->fuji_service_time_detail->date_time_5_from ) )}}</td>
        <td>{{ date( "d-M-Y", strtotime( $fuji_service->fuji_service_time_detail->date_time_5_to ) )}}</td>
        <td>{{ date( "h:i", strtotime( $fuji_service->fuji_service_time_detail->date_time_5_to ) )}}</td>
    </tr>
    @endif
    @if(!empty($fuji_service->fuji_service_time_detail->date_time_1_from))
    <tr>
        <td>{{ date( "d-M-Y", strtotime( $fuji_service->fuji_service_time_detail->date_time_6_from ) )}}</td>
        <td>{{ date( "h:i", strtotime( $fuji_service->fuji_service_time_detail->date_time_6_from ) )}}</td>
        <td>{{ date( "d-M-Y", strtotime( $fuji_service->fuji_service_time_detail->date_time_6_to ) )}}</td>
        <td>{{ date( "h:i", strtotime( $fuji_service->fuji_service_time_detail->date_time_6_to ) )}}</td>
    </tr>
    @endif
    @if(!empty($fuji_service->fuji_service_time_detail->date_time_1_from))
    <tr>
        <td>{{ date( "d-M-Y", strtotime( $fuji_service->fuji_service_time_detail->date_time_7_from ) )}}</td>
        <td>{{ date( "h:i", strtotime( $fuji_service->fuji_service_time_detail->date_time_7_from ) )}}</td>
        <td>{{ date( "d-M-Y", strtotime( $fuji_service->fuji_service_time_detail->date_time_7_to ) )}}</td>
        <td>{{ date( "h:i", strtotime( $fuji_service->fuji_service_time_detail->date_time_7_to ) )}}</td>
    </tr>
    @endif

    <tr>
        <td>Labor Hrs:</td>
        <td>-</td>
        <td>OT</td>
        <td>-</td>
    </tr>
    <tr>
        <td>Labor Charges:</td>
        <td colspan="3">-</td>
    </tr>
    <tr>
        <td>Other Charges:</td>
        <td colspan="3">-</td>
    </tr>
    <tr>
        <td>Transportation:</td>
        <td colspan="3">-</td>
    </tr>
    <tr>
        <td>SubTotal:</td>
        <td colspan="3">-</td>
    </tr>
    <tr>
        <td>GST:</td>
        <td colspan="3">-</td>
    </tr>
    <tr>
        <td>Total:</td>
        <!-- '1'=>'Quotation','2'=>'Q&P','3'=>'Q&S','4'=>'Q&P&S','5'=>'Q&P&S&H','6'=>'No Quotation' -->
        @switch($fuji_service->job_type)
        @case(1)
        <td style="padding-left:10px;background-color: #ffb3cc">Only Quotation</td>
        @break
        @case(2)
            <td style="padding-left:10px;background-color: #ffb3cc">Only Part</td>
        @break
        @default('3')
            <td style="padding-left:10px;background-color: #ffb3cc">{{number_format($fuji_service->service_amount)}}</td>
        @break
        @case(4)
            <td style="padding-left:10px;background-color: #ffb3cc">{{number_format($fuji_service->service_amount+$fuji_service->part_amount)}}</td>
        @break
        @case(5)
            <td style="padding-left:10px;background-color: #ffb3cc">{{number_format($fuji_service->head_type->price)}}</td>
        @break
        @endswitch

        <td>VND</td>
        <td><div class="row">
                
            </div></td>
    </tr>
</table>