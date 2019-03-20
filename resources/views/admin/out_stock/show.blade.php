@extends('layouts.admin')
@section('title') Out and Return Stock @endsection
@section('content')
    <div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                </div>
                <div class="modal-body"> No data here </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->

    </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase"> Out and Return stock</span>
                                </div>

                            </div>

                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    <div class="row">
                                        <div class="col-lg-12">
                                    <!-- Alert when success or fail -->
                                    @if(Session::has('success'))
                                        <div class="alert alert-info">
                                            <i class="fa fa-folder-open"></i>
                                           <b>{{Session::get('success')}}</b>
                                        </div>
                                     @elseif(Session::has('fail'))
                                        <div class="alert alert-warning red">
                                          <b>{{ Session::get('fail') }}</b>
                                        </div>
                                     @else
                                     @endif
                                <!--Alert when success or fail-->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="btn-group">
                                                <a href="{{ url('admin/outstock/reset_create') }}" id="sample_editable_1_2_new" class="btn sbold green"> Add New
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                       <!-- <div class="col-md-6">
                                            {!! Form::open(['method'=>'GET','url'=>'admin/outstock']) !!}
                                                {!!Form::label('sample_file','Typing :',['class'=>'col-md-3'])!!}
                                                {!! Form::text('keyword',null,["id"=>"input-text1"]) !!}
                                               {!! Form::submit('Search',["id"=>"input-bt",'class'=>'btn sbold green']) !!}
                                            {!! Form::close() !!}
                                        </div>    -->
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_3">
                                    <thead>
                                    <tr>
                                       
                                        <th> No </th>
                                        <th> User Out</th>
                                        <th> User Return</th>
                                        <th> Part Out No</th>  
                                        <th> Date Out</th>                                      
                                        <th> Date Return</th>
                                        <th> Customer</th>
                                        <th> Type Form</th>
                                        <th> Status</th>
                                        <th> Change status</th>

                                        <th> Actions </th>
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
                                        <th> </th>


                                    </tr>
                                    </tfoot>

                                    <tbody>

                                    @if(isset($out_stocks))
                                        @foreach($out_stocks as $item)
                                    <tr class="odd gradeX">

                                        <td>{{($stt++)+1}}  </td>
                                        <td class="center">
                                                @if( isset($item->user_id) )
                                                     {{ $item->user->name }}
                                                @endif    
                                        </td>
                                        <td class="center">
                                            @if( isset($item->return_user_id) )
                                                 {{ $item->in_user->name }}
                                            @endif    
                                        </td>
                                        <td>PR{{str_pad($item->id, 4, '0',STR_PAD_LEFT)}}</td>
                                        <td>
                                            @if( isset($item->out_date) )
                                                {{date('d-m-Y',strtotime($item->out_date))}}
                                            @endif

                                        </td>
                                        <td>
                                            @if( isset($item->return_date) )
                                                {{date('d-m-Y',strtotime($item->return_date))}}
                                            @endif

                                        </td>
                                        <td>{{$item->customer->name}}</td>
                                        <td>{{$item->type_form}}</td>


                                            @if($item->status==3)
                                            <td style="max-width: 50px;overflow: hidden; white-space: nowrap;color: red;font-weight: bold ">
                                                Processing
                                            </td>
                                                @elseif($item->status==4)
                                            <td style="max-width: 50px;overflow: hidden; white-space: nowrap;color: Black;font-weight: bold ">
                                                Take out
                                            </td>
                                            @else
                                            <td style="max-width: 50px;overflow: hidden; white-space: nowrap;color: Blue;font-weight: bold ">
                                                Returned
                                            </td>
                                                @endif


                                        
                                       
                                        <td style="width: 210px;width:21%"  >
                                            {!! Form::open(['method'=>'POST','url'=>['admin/outstock/change_status',$item->id]]) !!}
                                            <select name="status" style="float: left; width: 55%" class="form-control">
                                                @foreach($item->get_statuses() as $key=>$status)
                                                    @if($item->status == $key)
                                                        <option value="{{$key}}" selected>
                                                            {!!$status!!}
                                                        </option>
                                                    @else
                                                        <option value="{{$key}}">
                                                            {{$status}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <button type="submit"  class="btn btn-success" style="margin-left: 10px"  onclick="return confirm('Are you sure to change status ?');">Apply</button>
                                            {!! Form::close() !!}
                                        </td>
                                        
                                        <td>

                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-left" role="menu">
                                                    <li>
                                                        <a data-toggle="modal" data-target="#large" href="{{url('admin/out-and-return-stock-detail/detail/'.$item->id)}}">
                                                            <i class="fa fa-file-pdf-o"></i> Show </a>
                                                    </li>
                                                    @if($item->status == 3)
                                                    <li>
                                                        <a href="{{url('getoutstock/'.$item->id)}}">
                                                            <i class="fa fa-file-pdf-o"></i> Edit Outstock </a>
                                                    </li>
                                                    @endif

                                                   <!-- <li>
                                                        <a href="{{url('admin/outstock/delete/'.$item->id)}}">
                                                            <i class="fa fa-file-pdf-o"></i> Delete Outstock </a>
                                                    </li> -->
                                                    <li>
                                                            <a href="{{url('admin/outstock/out_stock_pdf/'.$item->id)}}">
                                                                <i class="fa fa-file-pdf-o"></i> Print Out Stock  </a>
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