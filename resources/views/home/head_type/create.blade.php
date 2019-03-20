@extends('layouts.admin')
@section('title') Create new head type @endsection
@section('level1') Create new head @endsection
@section('formName') Create Head Info @endsection
@section('content')


    {!! Form::open(['type'=>'POST','url'=>'admin/headtype','role'=>'form']) !!}

    @include('admin.head_type.form')

    {!! Form::close() !!}
@endsection