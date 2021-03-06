@extends('layouts.admin')
@section('title') Detail @endsection
@section('content')
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMBS -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Service Dept</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Detail</a>

                </li>

            </ul>
            <div class="row">
            <div class="col-md-6">
                    <div class="btn-group">
                        <a href="{!! url('admin/fujiservice/report/{id}') !!}" id="sample_editable_1_2_new" class="btn sbold green"> Export to PDF
                            
                        </a>
                    </div>
                </div>
            </div>
            <!-- END PAGE BREADCRUMBS -->
            <!-- BEGIN PAGE CONTENT INNER -->
            
            @include('admin.fuji_service.service_report_table')

            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT BODY -->
    <!-- END CONTENT BODY -->

@endsection