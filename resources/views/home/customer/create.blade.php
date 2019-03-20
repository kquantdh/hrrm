@extends('layouts.admin')
@section('title') Create new customer @endsection
@section('level1') Create new customer @endsection
@section('formName') Create Customer Info @endsection
@section('content')

    {!! Form::open(['type'=>'POST','url'=>'admin/customer','role'=>'form']) !!}

    @include('admin.customer.form');

    {!! Form::close() !!}

@endsection