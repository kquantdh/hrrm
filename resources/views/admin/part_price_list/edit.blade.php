@extends('layouts.admin')
@section('title') Edit Spare Part  @endsection
@section('level1')  Edit Spare Part @endsection
@section('formName')  Edit Spare Part @endsection

@section('content')

    {!! Form::model($part_price_lists, ['method'=>'PATCH','files'=>'true','url'=>['admin/partpricelist/edit',$part_price_lists->id], 'role'=>'form']) !!}
        @include('admin.part_price_list.form_edit')
    {!! Form::close() !!}
@endsection