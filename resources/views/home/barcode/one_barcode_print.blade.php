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
        * {
            box-sizing: border-box;
        }

        .column {
            float: left;
            width: 100%;
            padding: 20px;
            margin-top: 40px;
        }

        /* Clearfix (clear floats) */
        .row::after {
            content: "";
            clear: both;
            display: table;
        }
        a{
            text-align:center ;
            font-size: 80px;
            font-family: Sans-Serif;
            color: black;
        }
        div{
            text-align: center
        }

    </style>
</head>
<body>
    @foreach ($in_stock_details as$key=> $sp)


     <div class="row">
        <div class="column">

 <img src="data:image/png;base64,{!!DNS2D::getBarcodePNG($sp->barcode, 'QRCODE')!!}" alt="barcode" style="width:95%;margin: 20px" />
           <div ><a>{{$sp->part_id}}</a></div>
        </div>

      </div>
    @endforeach
</body>
</html>

