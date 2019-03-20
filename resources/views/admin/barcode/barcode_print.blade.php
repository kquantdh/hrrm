<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
       @page {
            size: 105mm 22mm;
        }
        * {
            box-sizing: border-box;
            margin: 5px;
            padding: 0px;
        }

        .column {
            padding-left:23px;
            height: 22mm;
            width: 35mm;

        }
       .row::after {
           content: "";
           clear: both;


       }

    </style>
</head>
<body>

@foreach ($in_stock_details as$key=> $sp)
            <img src="data:image/png;base64,{!!DNS2D::getBarcodePNG($sp->barcode, 'QRCODE')!!}" alt="barcode" style="width:18mm;margin-left:6mm;margin-top:1.5mm;display: inline" />

            <div style="text-align: center;position: absolute;left:120px;top: 17px"><p style="display: inline;position: absolute;left: 0mm;top: 200px">{{$sp->part_id}}</p></div>
            <div style="text-align: center;position: absolute;left:300px;top: 17px"><p style="display: inline;position: absolute;left: 0mm;top: 200px">{{($key++)+1}}</p></div>

@endforeach
</body>
</html>

