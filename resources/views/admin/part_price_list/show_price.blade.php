@extends('layouts.admin')
@section('title') Part Price List @endsection
@section('content')
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase"> Part price table </span>
                                </div>

                            </div>
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    @if(Session::has('success'))
                                        <div class="row">
                                            <!-- Welcome -->
                                            <div class="col-lg-12">
                                                <div class="alert alert-info">
                                                    <i class="fa fa-folder-open"></i>
                                                    <b>{{Session::get('success')}}</b>
                                                </div>
                                            </div>
                                            <!--end  Welcome -->
                                        </div>
                                    @endif
                                        @if(Session::has('warning'))
                                            <div class="row">
                                                <!-- Welcome -->
                                                <div class="col-lg-12">
                                                    <div class="alert alert-info">
                                                        <i class="fa fa-folder-open"></i>
                                                        <b>{{Session::get('warning')}}</b>
                                                    </div>
                                                </div>
                                                <!--end  Welcome -->
                                            </div>
                                        @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="btn-group pull-right">
                                                <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="{{url('admin/partpricelist/delete')}}">
                                                            <i class="fa fa-file-pdf-o"></i> Delete All Part </a>

                                                    </li>

                                                    <li>
                                                        <a href="{{url('admin/partpricelist/modal')}}">
                                                            <i class="fa fa-file-pdf-o"></i> Import Excel </a>

                                                    </li>
                                                    <li>
                                                        <a href="{{ url('admin/exportPartPriceList') }}">
                                                            <i class="fa fa-print"></i> Export to Excel </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <table id="example" class="table table-striped table-bordered table-hover table-checkable order-column" >
                                    <thead>
                                    <tr>
                                        <th ></th>
                                        <th >Part No </th>
                                        <th> Part Name  </th>
                                        <th> Description  </th>
                                        <th> Repnews </th>
                                        <th> Machine </th>
                                        <th> Price </th>
                                        <th> VN name </th>
                                        <th> Detail </th>
                                        <th> Material </th>
                                        <th> Action </th>
                                    </tr>
                                    <form class="form-inline" style="padding-bottom: 10px">
                                    <tr role="row" class="filter">
                                        <td> </td>
                                        <td>
                                            <input type="text" class="form-control form-filter input-sm" id="staticEmail2"> </td>
                                        <td>
                                            <input type="text" class="form-control form-filter input-sm" id="staticEmail3"> </td>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-filter input-sm" id="staticEmail4"> </td>
                                        <td>

                                        <td>

                                        <td>

                                        <td>
                                            <select name="order_status" class="form-control form-filter input-sm">
                                                <option value="">Select...</option>
                                                <option value="pending">Pending</option>
                                                <option value="closed">Closed</option>
                                                <option value="hold">On Hold</option>
                                                <option value="fraud">Fraud</option>
                                            </select>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                    </form>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>

@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            var example = $('#example').DataTable( {
                pagingType: "full_numbers",
                ordering:true,
                info:false,
                language: {
                    "paginate": {
                        "first":"First",
                        "previous": "Previous",
                        "next":"Next",
                        "last":"Last"
                    },
                    "sLengthMenu": "Show _MENU_ records",
                    "sInfo":         "Showing _START_ to _END_ of _TOTAL_ records",
                    "sInfoFiltered": "(filtered1 from _MAX_ total records)",
                    "sZeroRecords":  "No matching records found",
                    'sSearchPlaceholder':'Search:',
                    //processing: "<div id='divloader'></div>",
                },
               // responsive: true,
                info:true,
                searching: false,
                lengthMenu: [[10, 20,50, 100, 200, -1], [10, 20,50, 100, 200, "ALL"]],
                serverSide: true,
                processing: true,
                select: true,
                ajax: {
                    url: '{{URL::route('datatable.listPart')}}',
                    type: 'POST',
                    beforeSend:function(){
                    },
                    data: function ( d ) {
                        d._token = '{{csrf_token()}}';
                        d.partNo = $('#staticEmail2').val();
                        d.name = $('#staticEmail3').val();
                        d.description = $('#staticEmail4').val();
                    },
                    complete: function (data) {

                    },
                    error: function (xhr, error, thrown) {
                        $("#divloader").hide();
                    }
                },
                "initComplete":function( settings, data){

                },
                columns: [
                    {
                        "data": "detail" ,
                        "name": "detail",
                        orderable: false,
                        "className":"text-center"
                    },

                    {
                        "data": "id" ,
                        "name": "id",
                        "className":"text-center"
                    },
                    {
                        "data": "name" ,
                        "name": "name",
                        "className":"text-left"
                    },
                    {
                        "data": "description" ,
                        "name": "description",
                        "className":"text-left"
                    },
                    {
                        "data": "rep_new" ,
                        "name": "rep_new",
                        "className":"text-left"
                    },
                    {
                        "data": "machine" ,
                        "name": "machine",
                        "className":"text-center"
                    },
                    {
                        "data": "quantity" ,
                        "name": "quantity",
                        "className":"text-center"
                    },
                    {
                        "data": "price" ,
                        "name": "price",
                        "className":"text-left"
                    },
                    {
                        "data": "vn_name" ,
                        "name": "vn_name",
                        "className":"text-left"
                    },
                    {
                        "data": "material" ,
                        "name": "material",
                        "className":"text-left"
                    },
                    {
                        "data":{
                            'id':'id',
                            'status_key':'status_key',
                            'phone':'phone'
                        } ,
                        "name": "action",
                        "className":"text-left",
                        "width":"105px",
                        orderable: false,
                        "render":function (data) {
                            var result=``;
                            result+='<div class="btn-group">';
                            result+='<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions<i class="fa fa-angle-down"></i></button>';
                            result+='<ul class="dropdown-menu pull-left" role="menu">';
                            result+=`<li><form  action="{{ url('admin/partpricelist/edit/`+data.id+`') }}"><input type="submit" value="Edit" /></form></li>`;
                            result+='<li><form action="{{ url('#') }}"><input type="submit" value="Print Tag" /></form></li>';
                            result+='</ul>';
                            result+='</div>';
                            return result;

                        }
                    }
                ],
                drawCallback : function() {
                    if($('#phone-list tbody .dataTables_empty').length){
                        $('#phone-list tbody tr').hide()
                    }
                    var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                    pagination.toggle(this.api().page.info().pages > 1);
                },
                deferRender: true,
            } );

            $(document).on('keyup',function () {
                example.ajax.reload();
            })





        } );
    </script>

@endsection