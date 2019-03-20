@extends('layouts.admin')
@section('title') Edit Head History @endsection
@section('level1') Edit @endsection
@section('formName') Edit head history @endsection
@section('content')
   
           

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Spare part database </span>
                            </div>
                        </div>
                                <div class="portlet-body">
                                        <div class="table-toolbar">
                                <div class="row">
                                        <div class="col-md-6">
                                                <div class="btn-group">
                                                    <a href="{!! url('getcart',[$fuji_service->id]) !!}" id="sample_editable_1_2_new" class="btn sbold green"> Get old part list
                                                        
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">    
                                                    {!! Form::open(['method'=>'GET','url'=>'admin/fujiservice/create']) !!}
                                                    {!!Form::label('sample_file','Typing :',['class'=>'col-md-3'])!!}

                                                    {!! Form::text('keyword',null,["id"=>"input-text1"]) !!}
                                                   
                                                  
                                               
                                                   {!! Form::submit('Search',["id"=>"input-bt",'class'=>'btn sbold green']) !!}
                                               
                                                           {!! Form::close() !!}
                                            </div>
                                        </div>
                                
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="">
                                <thead>
                                <tr>
                                    <th class="numeric"> </th>
                                
                                    <th class="numeric"> Part No </th>
                                    <th class="numeric"> Part Name </th>
                                    <th class="numeric"> Description </th>
                                    <th class="numeric"> Repnews </th>
                                    <th class="numeric"> Machine</th>
                                    <th class="numeric"> Price </th>
                                    <th class="numeric"> VN name  </th>
                                    
                                    <th class="numeric"> Action </th>
                                </tr>
                                </thead>
  
                                <tbody>
                                @if(isset($part_price_lists))
                                    @foreach($part_price_lists as $item)
                                        <tr class="odd gradeX">
                                            <td class="center"> </td>
                                        <td class="center"> {{$item->id}} </td>
                                        <td class="center">{{$item->name}}</td>
                                        <td class="center">{{$item->description}}</td>
                                        <td class="center">{{$item->rep_new}}</td>
                                        <td class="center">{{$item->machine}}</td>
                                        <td class="center"> {{$item->price}} </td>
                                        <td class="center"> {{$item->vn_name}}</td>


                                            <td><a title="Add to Cart" href="{!! url('muahang',[$item->id]) !!}"><i class="fa fa-plus"></i> Add</a>
                                                
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



            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Spare part list</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_2">
                                <thead>
                                <tr>
                                    <th class="numeric"> </th>
                                    <th class="numeric"> Part No </th>
                                    <th class="numeric"> Part Name </th>
                                    
                                    <th class="numeric"> Quantity </th>
                                    <th class="numeric"> Price </th>
                                    <th class="numeric"> VN name </th>
                                    <th class="numeric"> Location </th>
                                    <th class="numeric"> Action </th>
                                </tr>
                                </thead>
                                <tfoot>
                                </tfoot>
                                <tbody>
                                      @foreach(Cart::content() as $item)
                                        <tr class="odd gradeX">
                                                <td class="center"></td>
                                            <td class="center"> {{$item->id}} </td>
                                            <td class="center">{{$item->name}} </td>
                                            
                                            <td class="center">

                                                {!! Form::open(['method' => 'POST','url' => [ 'admin/fujiservice/create/edit/update-edit-cart', $item->id]]) !!}
                                                <input type="number" name="qty" value="{{$item->qty}}" width="30" maxlength="2"/>
                                                <input type="submit" value="Update"/>
                                                {!! Form::close() !!}
                                            </td>
                                            <td class="center"> {{$item->price}} </td>
                                            <td class="center"> {{$item->options->vn_name}}</td>


                                            


                                            <td class="center">{{$item->options->location}}</td>
                                            <td><a href="{{ url('admin/fujiservice/create/edit/delete/'.$item->id) }}">Delete </a> <br/></td>
                                        </tr>
                                    @endforeach
                                    

                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>

    
    {!! Form::model($fuji_service, ['method'=>'PATCH','files'=>'true','url'=>['admin/fujiservice/create/edit',$fuji_service->id], 'role'=>'form']) !!}
    @include('admin.fuji_service.form')
    {!! Form::close() !!}

@endsection