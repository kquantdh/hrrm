@extends('admin.fuji_service.form.form')
@section('form_service')
    <a href="{{url('admin/fujiservice/create/edit_more_service/'.$fuji_service->id)}}" onclick="return confirm('Please save before exit. If No, all part is deleted')" id="sample_editable_1_2_new" class="btn sbold yellow">More</a>

@endsection