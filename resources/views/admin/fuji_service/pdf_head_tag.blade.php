<!DOCTYPE html>
<html>
<head>
    <style>
        @page {
            size:  75mm 150mm ;
        }
        * {
            box-sizing: border-box;
            margin: 0px;
            padding: 2px;
            font-size: 9px;
        }

        .column {
            padding:2px;
            height: 22mm;
            width: 35mm;

        }
        .row::after {
            content: "";
            clear: both;


        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }


    </style>

</head>
<body>
<table style="width:100%" >

    <tbody>
    <tr>
        <th style="border: none"><img src="{{asset('img/FUJI-LOGO.png')}}" alt="logo" class="logo-default" height="20px" style="text-align: right" padding-top="3px"  ></th>
        <th colspan="2" style="font-weight:bold;font-size: 13px;text-align: Center;border: none"> Head Repairing Tag</th>
    </tr>
    <tr>
        <th colspan="2">Recieve date : {{ date( "d-M-Y", strtotime( $fuji_services->fuji_service_time_detail->date_time_sr_start ) )}}</th>
        <th><input type="checkbox" value="" style="margin-top: 4px"><label>Urgen</label></th>
    </tr>
    <tr>
        <th colspan="3">Customer : {{$fuji_services->customer->name}}</th>
    </tr>
    <tr>
        <th colspan="3">Head type : {{$fuji_services->head_type->name}}</th>
    </tr>
    <tr>
        <th colspan="3">Head S/N : {{$fuji_services->head_serial}}</th>
    </tr>
    <tr>
        <th colspan="3">Error code:</th>
    </tr>
    <tr>
        <th colspan="3">Error detail : {{substr($fuji_services->problem, 3, 48)}}</th>
    </tr>
    <tr>
        <th colspan="3">-</th>
    </tr>
    <tr>
        <th colspan="3"> Target complete date:</th>
    </tr>
    <tr>
        <th colspan="2"> Investigation:</th>
        <th><input type="checkbox" value="" style="margin-top: 4px"><label>Completed</label></th>
    </tr>
    <tr>
        <th colspan="2"> Create spare part list:</th>
        <th><input type="checkbox" value="" style="margin-top: 4px"><label>Completed</label></th>
    </tr>
    <tr>
        <th colspan="2"> Create quotation:</th>
        <th><input type="checkbox" value="" style="margin-top: 4px"><label>Completed</label></th>
    </tr>
    <tr>
        <th colspan="2"> Issue PO:</th>
        <th><input type="checkbox" value="" style="margin-top: 4px"><label>Completed</label></th>
    </tr>
    <tr>
        <th colspan="2"> Recieve spare part:</th>
        <th><input type="checkbox" value="" style="margin-top: 4px"><label>Completed</label></th>
    </tr>
    <tr>
        <th colspan="2"> Replacement Parts:</th>
        <th><input type="checkbox" value="" style="margin-top: 4px"><label>Completed</label></th>
    </tr>
    <tr>
        <th colspan="2"> Proper Data Measurement(If need)</th>
        <th><input type="checkbox" value="" style="margin-top: 4px"><label>Completed</label></th>
    </tr>
    <tr>
        <th colspan="2"> Checking of IPS image(If need)</th>
        <th><input type="checkbox" value="" style="margin-top: 4px"><label>Completed</label></th>
    </tr>
    <tr>
        <th colspan="2"> Checking of Vacuum pressure(If need):</th>
        <th><input type="checkbox" value="" style="margin-top: 4px"><label>Completed</label></th>
    </tr>
    <tr>
        <th colspan="2"> Checking of Vacuum break(If need):</th>
        <th><input type="checkbox" value="" style="margin-top: 4px"><label>Completed</label></th>
    </tr>
    <tr>
        <th colspan="2"> Movement Check(By Head Bench):</th>
        <th><input type="checkbox" value="" style="margin-top: 4px"><label>Completed</label></th>
    </tr>
    <tr style="border-bottom-style:none">
        <th style="border: none" colspan="3">Other items for testing(in the machine) :</th>
    </tr>
    <tr style="border-bottom-style:none">
        <th style="border: none"><input type="checkbox" value="" style="margin-top: 4px"><label>Hybrid Calibration</label></th>
        <th style="border: none"><input type="checkbox" value="" style="margin-top: 4px"><label>Backup Pin</label></th>
        <th style="border: none"><input type="checkbox" value="" style="margin-top: 4px"><label>Nozzle Changer</label></th>
    </tr>
    <tr style="border-top-style:none">
        <th style="border: none"><input type="checkbox" value="" style="margin-top: 4px"><label>Pickup Test</label></th>
        <th style="border: none"><input type="checkbox" value="" style="margin-top: 4px"><label>Pam</label></th>
        <th style="border: none"><input type="checkbox" value="" style="margin-top: 4px"><label>Idling Test </label></th>
    </tr>
    <tr>
        <th colspan="3"> Complete Date:</th>
    </tr>
    <tr>
        <th  style="height: 6.2mm" colspan="3" rowspan="2"> Verify by:</th>

    </tr>
    <tr></tr>



    </tbody>
</table>

</body>
</html>
