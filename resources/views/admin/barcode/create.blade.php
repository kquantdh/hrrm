@extends('layouts.admin')
@section('title') Create barcode @endsection
@section('level1') Create barcode @endsection
@section('formName') Create barcode @endsection
@section('content')

    {!! Form::open(['type'=>'POST','url'=>'admin/barcode/create','role'=>'form']) !!}

    @include('admin.barcode.form');

    {!! Form::close() !!}

@endsection