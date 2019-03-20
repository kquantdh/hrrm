@extends('layouts.admin')
@section('title') Edit head type @endsection
@section('level1') Edit new head @endsection
@section('formName') Edit Head Info @endsection
@section('content')


    {!! Form::model($head_type, ['method'=>'PATCH','files'=>'true','url'=>['admin/headtype',$head_type->id], 'role'=>'form']) !!}

    @include('admin.head_type.form')

@endsection