@extends('layouts.admin')
@section('title') Create Instock @endsection
@section('level1') Create Instock @endsection
@section('formName') Create Instock @endsection

@section('content')

        <div class="row">
                @if(Session::has('out_of_stock'))
                <div class="container margin-top-10">
                    <div class="col-sm-12">
                        <div class="alert alert-warning red">
                            <b>{{ Session::get('out_of_stock') }}</b>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Price list </span>
                        </div>
                    </div>
                    <div class="portlet-body">


                            <div class="table-toolbar">
                                <p id="demo"></p>
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
                                                    {!! Form::open(['method'=>'GET','url'=>'admin/instock/create']) !!}
                                                    {!!Form::label('sample_file','Typing :',['class'=>'col-md-3'])!!}
                                                    {!! Form::text('keyword',null,["id"=>"input-text1"]) !!}
                                                   {!! Form::submit('Search',["id"=>"input-bt",'class'=>'btn sbold green']) !!}
                                                   {!! Form::close() !!}
                                            </div>
                                        </div>
                                </div>


                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="">
                            <thead>
                            <tr>
                                <th class="numeric">No </th>
                                <th class="numeric"> Part Number </th>
                                <th class="numeric"> Part Name </th>
                                <th class="numeric"> Description </th>
                                <th class="numeric"> Repnews </th>
                                <th class="numeric"> Machine</th>
                                <th class="numeric"> Price </th>
                                <th class="numeric"> Detail </th>
                                <th class="numeric"> VN name  </th>
                                <th class="numeric"> Action </th>
                            </tr>
                            </thead>
                           
                            <tbody>
                            @if(isset($part_price_lists))
                                @foreach($part_price_lists as $k=>$item)
                                    <tr class="odd gradeX">
                                        <td class="center"> {{$k+1}}</td>
                                        <td class="center"> {{$item->id}}</td>
                                        <td class="center">{{$item->name}}</td>
                                        <td class="center">{!! $item->description !!}</td>
                                        <td class="center">{!! $item->rep_new !!}</td>
                                        <td class="center">{{$item->machine}}</td>
                                        <td class="center"> {{$item->price}} </td>
                                        <td class="center"> {{$item->detail}} </td>
                                        <td class="center"> {{$item->vn_name}}</td>
                                        
                                        <td><a title="Add to Cart" href="{!! url('instock',[$item->id]) !!}"><i class="fa fa-plus"></i> Add</a></td>
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
                            <span class="caption-subject bold uppercase"> List for instock</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_2">
                            <thead>
                            <tr>
                                <th ></th>
                                <th > Part Number</th>
                                <th > Part Name </th>
                                <th > Belong to </th>
                                <th > Number </th>
                                <th > Location </th>
                                <th > Detail </th>
                                <th > Q'ty </th>
                                <th > Action </th>
                            </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            
                            <tbody>
                            @if(Cart::instance('createInstock')->count() > 0)
                                @foreach(Cart::instance('createInstock')->content() as $item)
                                    <tr class="odd gradeX">
                                      {!! Form::open(['method' => 'POST','url' => [ 'admin/instock/create/updatebarcode', $item->id]]) !!}
                                        <td> </td> 
                                        <td style="width:13%"> {{$item->id}}</td>
                                        <td >{{$item->name}}</td>
                                        <td style="width:15%">
                                            <input id="input-cart-belongto" type="text" name="belongto" value="{{$item->options->belongto}}" style="width:100%" maxlength="15"/></td>
                                        <td style="width:13%" > 
                                            <input id="input-cart-number" type="text" name="number" value="{{$item->options->number}}" style="width:100%" maxlength="15"/></td>
                                        <td style="width:11%" >
                                                <input id="input-cart-location"type="text" name="location" value="{{$item->options->location}}" style="width:100%" maxlength="15"/></td>
                                        <td style="width:15%" >
                                            <input type="text" name="detail" value="{{$item->options->detail}}" style="width:100%" /></td>
                                        <td style="width:15%" >
                                            <input type="number" name="qty" value="{{$item->qty}}" style="width:30%" maxlength="2"/>
                                            <input type="submit" value="Update"/></td>
                                        <td style="width:5%"><a href="{{ url('admin/instock/create/deleteinstock/'.$item->id) }}">Delete </a> <br/></td>
                                        {!! Form::close() !!}
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
        {!! Form::open(['type'=>'POST','url'=>'admin/instock/create/', 'files'=>'true', 'role'=>'form']) !!}
    @include('admin.stock.form')
    {!! Form::close() !!}
@endsection