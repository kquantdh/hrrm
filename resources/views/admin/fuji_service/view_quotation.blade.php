@extends('layouts.admin_quotation_table')
@section('title') Quotation @endsection
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                    <div class="col-md-6"> 
                            <div class="row">
                               
                                <div class="col-xs-3 col-sm-3 col-md-3 text-center">
                                    <a href="{{ url('admin/fujiservice/excel-quotation',[$fuji_services->id]) }}" id="sample_editable_1_2_new" class="btn sbold green"> Export Excel
                                    </a>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 text-center">
                                    <a href="{{ url('admin/fujiservice/pdf-quotation',[$fuji_services->id]) }}" id="sample_editable_1_2_new" class="btn sbold green"> Export PDF
                                    </a>
                                </div>
                            </div>
                    </div>
            <!-- BEGIN PAGE CONTENT INNER -->
               @include('admin.fuji_service.table_quotation')
            

            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT BODY -->
    <!-- END CONTENT BODY -->
    </div>
@endsection