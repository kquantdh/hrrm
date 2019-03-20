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

                                    <div class="row">

                                            <div class="col-md-4">

                                                    {!! Form::open(['method'=>'GET','url'=>'admin/partpricelist']) !!}


                                                    {!! Form::text('keyword',null,["id"=>"input-text1"]) !!}
                                                   <input name="fieldChoose" type="radio"  value="id" >Part No
                                                   <input name="fieldChoose" type="radio" value="name"  > Part name
                                                  
                                               
                                                   {!! Form::submit('Search',["id"=>"input-bt",'class'=>'btn sbold green']) !!}
                                               
                                                           {!! Form::close() !!}


                                            </div>
                                        <div class="col-md-4">

                                            <a href="{{ url('admin/partpricelist/create') }}" id="sample_editable_1_2_new" class="btn sbold green"> Add New</a>
                                        </div>
                                        </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample">
                                    <thead>
                                    <tr>                                        
                                        <th> No </th>
                                        <th> Part No </th>
                                        <th> Part Name </th>
                                        <th> Description </th>
                                        <th> Repnews </th>
                                        <th> Machine </th>
                                        <th> Price </th>
                                        <th> VN name </th>
                                        <th> Detail </th>
                                        <th> Material </th>
                                        <th> Action </th>


                                        
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @if(isset($part_price_lists))
                                        @foreach($part_price_lists as $item)
                                            <tr class="odd gradeX">                                                
                                                <td class="center">{{($stt++)+1}} </td>
                                                <td class="center">{{$item->id}}</td>
                                                <td class="center">{{$item->name}}</td>
                                                <td class="center">{!! $item->description!!}</td>
                                                <td class="center">{!!  $item->rep_new!!}</td>
                                                <td class="center">{{$item->machine}}</td>
                                                <td class="center">{{$item->price}} </td>
                                                <td class="center">{{$item->vn_name}}</td>
                                                <td class="center">{{$item->detail}}</td>
                                                <td class="center">{{$item->material}}</td>

                                                
                                                <td>

                                                    <div class="btn-group">
                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <form  action="{{ url('admin/partpricelist/edit/'.$item->id) }}">
                                                                    <input type="submit" value="Edit" />
                                                                </form>

                                                            </li>

                                                            <li>
                                                                <form  action="{{ url('#') }}">
                                                                    <input type="submit" value="Print Tag" />
                                                                </form>
                                                            </li>

                                                            <li class="divider"> </li>

                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    @endif


                                    </tbody>
                                </table>
                                @if($part_price_lists->links())
                                        {!! $part_price_lists->links() !!}
                                    @endif
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>

  

@endsection