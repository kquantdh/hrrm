@extends('layouts.admin')
@section('title') Create Spare Part  @endsection
@section('level1')  Create Spare Part @endsection
@section('formName')  Create Spare Part @endsection

@section('content')


    {!! Form::open(['type'=>'POST','url'=>'admin/partpricelist/create/', 'files'=>'true', 'role'=>'form']) !!}
    @include('admin.part_price_list.form')
    {!! Form::close() !!}
@endsection