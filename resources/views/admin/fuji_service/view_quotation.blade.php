@extends('layouts.admin_quotation_table')
@section('title') @switch($fuji_services->job_type)
@case('1')
Quotation Part
@break
@case('2')
Quotation Service
@break
@case('3')
Quotation Part and Service
@break
@case('4')
Quotation Part and HRR
@break
@case('5')
No Quotation Part
@break
@case('6')
No Quotation Service
@case('7')
No Quotation Part and Service
@case('8')
No Quotation Part and HRR
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
                @if($fuji_services->job_type==1 ||$fuji_services->job_type==5)
                    @include('admin.fuji_service.pdf_quotation_table.table_quotation_part')
                @elseif($fuji_services->job_type==2 ||$fuji_services->job_type==6)

                @elseif($fuji_services->job_type==3 ||$fuji_services->job_type==7)

                @else
                    @include('admin.fuji_service.pdf_quotation_table.table_quotation_part_service')
                @endif


            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT BODY -->
    <!-- END CONTENT BODY -->
    </div>
@endsection