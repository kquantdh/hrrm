@extends('layouts.admin')
@section('title') Edit User  @endsection
@section('level1')  Edit User @endsection
@section('formName')  Edit User @endsection

@section('content')

    {!! Form::model($users, ['method'=>'PATCH','files'=>'true','url'=>['admin/user/edit',$users->id], 'role'=>'form']) !!}
        @include('admin.user.form')
    {!! Form::close() !!}
@endsection