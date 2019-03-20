@extends('layouts.admin')
@section('title') Part table @endsection
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
                                    <div class="row">
                                        <div class="col-md-6">    
                                             {!! Form::open(['method' => 'POST','url' => ['admin/partpricelist-import'],'files'=>'true']) !!}
                                                <div class="row">
                                                    <div class="col-xs-8 col-sm-8 col-md-8">
                                                     @if(Session::has('Success'))
                                                        <div class="alert alert-success">{{ Session::get('message')}}</div>
                                                     @if(Session::has('warning'))
                                                        <div class="alert alert-warning">{{ Session::get('message')}}</div>
                                                        @endif
                                                        @endif
                                                          <div class="form-group">
                                                              {!!Form::label('sample_file',' Import File:',['class'=>'col-md-3'])!!}
                                                              <div class="col-md-9">
                                                                  {!!Form::file('part_price_lists',array('class'=>'form-control'))!!}
                                                                  {!!$errors->first('parts','<p class="alert alert-danger">
                                                                    :message</p>')!!}
                                                              </div>
                                                          </div>                                                       

                                                    </div>
                                                    <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                        
                                                    </div>
                                                    
                                                    <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                                        <a href="{{ url('admin/fujiservice/create') }}" id="sample_editable_1_2_new" class="btn sbold green"> Add New
                                                            
                                                        </a>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                {!!Form::close()!!}
                                            
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
                                                        <a href="{{ url('admin/sparepart-export') }}">
                                                            <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-6">    
                                                    {!! Form::open(['method'=>'GET','url'=>'admin/partpricelist']) !!}
                                                    {!!Form::label('sample_file','Typing :',['class'=>'col-md-3'])!!}

                                                    {!! Form::text('keyword',null,["id"=>"input-text1"]) !!}
                                                   <input name="fieldChoose" type="radio"  value="part_no" >Part No
                                                   <input name="fieldChoose" type="radio" value="name"  > Part name
                                                  
                                               
                                                   {!! Form::submit('Search',["id"=>"input-bt",'class'=>'btn sbold green']) !!}
                                               
                                                           {!! Form::close() !!}
                                            </div>
                                        </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample">
                                    <thead>
                                    <tr>                                        
                                        <th> No </th>
                                        <th> Part No </th>
                                        <th> Part Name </th>
                                        <th> Descrip </th>
                                        <th> Price </th>
                                        <th> VN name </th>
                                        <th> Img </th>
                                        <th> Q'ty </th>
                                        <th> Fixed Q'ty </th>
                                        <th> Location </th>
                                        <th> Location </th>
                                        
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @if(isset($part_price_lists))
                                        @foreach($part_price_lists as $item)
                                            <tr class="odd gradeX">                                                
                                                <td class="center"> </td>
                                                <td class="center">{{$item->id}}</td>
                                                <td class="center">{{$item->name}}</td>
                                                <td class="center">{{$item->description}}</td>
                                                <td class="center">{{$item->price}} </td>
                                                <td class="center">{{$item->vn_name}}</td>
                                                <td class="center">{{$item->thumbnail}}</td>
                                                <td class="center">{{$item->quantity}}</td>
                                                <td class="center">{{$item->fixed_quantity}} </td>
                                                <td class="center">{{$item->location}}</td>
                                                
                                                <td>

                                                    <div class="btn-group">
                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <form  action="{{ url('admin/headtype/'.$item->id.'/edit') }}">
                                                                    <input type="submit" value="Edit" />
                                                                </form>

                                                            </li>
                                                            <li>
                                                                {!! Form::open(['method'=>'DELETE','url'=>'admin/headtype/'.$item->id]) !!}

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
                                @if($part_price_lists->links())
                                        {!! $part_price_lists->links() !!}
                                    @endif
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>

  

@endsection