@extends('layouts.admin')
@section('title') Detail @endsection
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                    <div class="col-md-6"> 
                            <div class="row">
                               
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    <a href="{{ url('admin/fujiservice/pdf-head-repair-report',[$fuji_service->id]) }}" id="sample_editable_1_2_new" class="btn sbold green"> Export
                                    </a>
                                </div>
                            </div>
                    </div>
            <!-- BEGIN PAGE CONTENT INNER -->
            @include('admin.fuji_service.pdf_head_repair_report_table.table_head_repair_report')
            

            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT BODY -->
    <!-- END CONTENT BODY -->
    </div>
@endsection