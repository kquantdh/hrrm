@extends('layouts.admin')
@section('title') Customer @endsection
@section('content')
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="page-content-inner">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase"> Customer</span>
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="btn-group">
                                                <a href="{{ url('admin/customer/create') }}" id="sample_editable_1_2_new" class="btn sbold green"> Add New
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="btn-group pull-right">
                                                <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-print"></i> Print </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_8">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th> Short Name </th>
                                        <th> Full Name  </th>
                                        <th> Address </th>
                                        <th> PIC Phone </th>
                                        <th> PIC</th>
                                        <th> Transport</th>
                                        <th> JPY</th>
                                        <th> USD</th>
                                        <th> Actions</th>

                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>



                                    </tr>
                                    </tfoot>

                                    <tbody>

                                    @if(isset($customers))
                                        @foreach($customers as $item)
                                            <tr class="odd gradeX">
                                                <td>{{($stt++)+1}}</td>
                                                <td>{{$item->name}} </td>
                                                <td>{{$item->full_name}} </td>
                                                <td>{{$item->address}}</td>
                                                <td class="center"> {{$item->mobile}}  </td>
                                                <td class="center"> {{$item->person}}  </td>
                                                <td class="center"> {{$item->transport_price}}  </td>
                                                <td class="center"> {{$item->jpy_rate}}  </td>
                                                <td class="center"> {{$item->usd_rate}}  </td>


                                                <td>

                                                    <div class="btn-group">
                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <form  action="{{ url('admin/customer/'.$item->id.'/edit') }}">
                                                                    <input type="submit" value="Edit" />
                                                                </form>

                                                            </li>
                                                            <li>
                                                                {!! Form::open(['method'=>'DELETE','url'=>'admin/customer/'.$item->id]) !!}

                                                                <button>Delete </button>
                                                            </li>
                                                            <li>
                                                                <form  action="{{ url('#') }}">
                                                                    <input type="submit" value="Print Tag" />
                                                                </form>
                                                            </li>

                                                            <li class="divider"> </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="icon-flag"></i> Comments
                                                                    <span class="badge badge-success">4</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    @endif


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>

            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT BODY -->
    <!-- END CONTENT BODY -->

@endsection