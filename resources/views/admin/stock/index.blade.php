@extends('layouts.admin')
@section('title')In Stock @endsection
@section('content')
    <div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"></h4>

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
                                    <span class="caption-subject bold uppercase"> In Stock</span>
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
                                                <a href="{{ url('admin/instock/reset_create') }}" id="sample_editable_1_2_new" class="btn sbold green"> Add New
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>



                                       <!-- <div class="col-md-6">
                                                {!! Form::open(['method'=>'GET','url'=>'admin/instock']) !!}
                                                    {!!Form::label('sample_file','Typing :',['class'=>'col-md-3'])!!}
                                                    {!! Form::text('keyword',null,["id"=>"input-text1"]) !!}
                                                   {!! Form::submit('Search',["id"=>"input-bt",'class'=>'btn sbold green']) !!}
                                                {!! Form::close() !!}
                                            </div>-->
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_4">
                                    <thead>
                                    <tr>
                                       
                                        <th> No </th>
                                        <th> User</th>
                                        <th> Invoice</th>
                                        <th> PO</th>
                                        <th> In date</th>
                                        <th> Remark</th>

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



                                    </tr>
                                    </tfoot>

                                   
                                    <tbody>
                                    @if(isset($in_stocks))
                                        @foreach($in_stocks as $item)
                                    <tr class="odd gradeX">
                                       
                                        <td> {{$item->id}} </td>
                                        <td class="center">
                                                @if( isset($item->user_id) )
                                                {{ $item->user->name }}
                                            @endif    
                                        </td>
                                        <td>{{$item->inv_no}}</td>
                                        <td>{{$item->po_no}}</td>
                                        <td>{{date('d-m-Y',strtotime($item->in_date))}}</td>
                                        <td>{!! $item->remark !!}</td>
                                        <td>

                                         <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-left" role="menu">
                                                    <li>
                                                        <a data-toggle="modal" data-target="#large" href="{{url('admin/stock-modal/detail/'.$item->id)}}">
                                                            <i class="fa fa-file-pdf-o"></i> Show </a>

                                                    </li>
                                                    @if (Auth::user()->group_id==1)
                                                    <li>
                                                        <a href="{{url('getinstock/'.$item->id)}}">
                                                            <i class="fa fa-file-pdf-o"></i> Edit Instock </a>

                                                    </li>
                                                    <li>
                                                        <a  href="{{url('admin/instock/delete/'.$item->id)}}" onclick="return confirm('Are you sure to delete totally this instock ?')">
                                                            <i  class="fa fa-file-pdf-o"></i> Delete Instock </a>
                                                    </li>
                                                    @endif
                                                    <li>

                                                        <a href="{{ url('admin/barcode/'.$item->id) }}">
                                                            <i class="fa fa-file-pdf-o"></i> Print QRcode1</a>
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