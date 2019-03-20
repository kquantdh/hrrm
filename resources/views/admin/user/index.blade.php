@extends('layouts.admin')
@section('title') User @endsection
@section('content')

   

                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase">User</span>
                                </div>

                            </div>
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    @if(Session::has('successAddPart'))
                                        <div class="row">
                                            <!-- Welcome -->
                                            <div class="col-lg-12">
                                                <div class="alert alert-info">
                                                    <i class="fa fa-folder-open"></i>
                                                    <b>{{Session::get('successAddPart')}}</b>
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
                                                        <a data-toggle="modal" data-target="#large" href="{{url('admin/partpricelist/modal')}}">
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
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_5">
                                    <thead>
                                    <tr>                                        
                                        <th> No </th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Group </th>
                                        <th> Action </th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>



                                    </tr>
                                    </tfoot>

                                    <tbody>

                                    @if(isset($users))
                                        @foreach($users as $item)
                                            <tr class="odd gradeX">                                                
                                                <td class="center">{{($stt++)+1}} </td>
                                                <td class="center">{{$item->name}}</td>
                                                <td class="center">{{$item->email}}</td>

                                                @if($item->group_id==1)
                                                    <td style="max-width: 50px;overflow: hidden; white-space: nowrap;color: red;font-weight: bold ">
                                                        Admin
                                                    </td>
                                                @elseif($item->group_id==2)
                                                    <td style="max-width: 50px;overflow: hidden; white-space: nowrap;color: Black;font-weight: bold ">
                                                        User
                                                    </td>
                                                @else
                                                    <td style="max-width: 50px;overflow: hidden; white-space: nowrap;color: Blue;font-weight: bold ">
                                                        Guest
                                                    </td>
                                                    @endif


                                                <td>

                                                    <div class="btn-group">
                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <form  action="{{ url('admin/user/edit/'.$item->id) }}">
                                                                    <input type="submit" value="Edit" />
                                                                </form>

                                                            </li>
                                                            <li>
                                                                {!! Form::open(['method'=>'DELETE','url'=>'admin/user/'.$item->id]) !!}

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

  

@endsection