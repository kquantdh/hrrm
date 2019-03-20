@extends('layouts.admin')
@section('title') Edit customer @endsection
@section('level1') Edit customer @endsection
@section('formName') Edit Customer Info @endsection
@section('content')


    {!! Form::model($customers, ['method'=>'PATCH','files'=>'true','url'=>['admin/customer',$customers->id], 'role'=>'form']) !!}

    @include('admin.customer.form');
@endsection