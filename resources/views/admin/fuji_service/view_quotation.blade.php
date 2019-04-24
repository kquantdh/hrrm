@extends('layouts.admin_quotation_table')
@section('title') @switch($fuji_services->job_type)
@case('1')
Quotation
@break
@case('2')
Quotation Part
@break
@case('3')
Quotation Service
@break
@case('4')
Quotation Part and Service
@break
@case('5')
Quotation Part and Service and HRR
@break
@case('6')
Quotation FOC
@break
@endswitch @endsection
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
            @switch($fuji_services->job_type)
                @case('1')
                  @include('admin.fuji_service.pdf_quotation_table.table_quotation_part')
                  @break
            @case('2')
                  @include('')
                  @break
            @case('3')
                  @include('')
                  @break
            @case('4')
                  @include('admin.fuji_service.pdf_quotation_table.table_quotation_part_service')
                  @break
            @case('5')
                  @include('')
                  @break
            @case('6')
                  @include('')
                   @break
            @endswitch
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT BODY -->
    <!-- END CONTENT BODY -->
    </div>
@endsection