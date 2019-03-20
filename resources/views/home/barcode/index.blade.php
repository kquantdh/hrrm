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
       .row{
           margin: 0px;
       }
       h2{
           margin-top: 60px;
       }
    </style>
</head>
<body>
    @foreach ($in_stock_details as$key=> $sp)
 <img src="data:image/png;base64,{!!DNS2D::getBarcodePNG($sp->barcode, 'QRCODE')!!}" alt="barcode" style="width:28.5%;margin-top:30px"  class="col-md-4"/>
    @endforeach
</body>
</html>

