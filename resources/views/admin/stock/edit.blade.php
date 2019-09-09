@extends('layouts.admin')
@section('title') Edit Instock @endsection
@section('level1') Edit @endsection
@section('formName') Edit Instock @endsection
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
                                                    <a href="{!! url('getinstock',[$in_stocks->id]) !!}" id="sample_editable_1_2_new" class="btn sbold green"> Get old part list
                                                        
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">    
                                             {!! Form::open(['method'=>'GET','url'=>array('admin/instock/create/edit',$in_stocks->id)]) !!}
                                                {!!Form::label('','Typing :',['class'=>'col-md-3'])!!}
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
                                <th class="numeric">No  </th>
                                <th class="numeric"> Part Number</th>
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
                                    @foreach($part_price_lists as $k=> $item)
                                        <tr class="odd gradeX">
                                        <td class="center">{{$k+1}}</td>
                                        <td class="center">  {{$item->id}} </td>
                                        <td class="center">{!! $item->name !!}</td>
                                        <td class="center">{!! $item->description !!}</td>
                                        <td class="center">{{$item->rep_new}}</td>
                                        <td class="center">{{$item->machine}}</td>
                                        <td class="center"> {{$item->price}} </td>
                                        <td class="center"> {{$item->detail}} </td>
                                        <td class="center"> {{$item->vn_name}}</td>
                                        
                                        <td><a title="Add to Cart" href="{!! url('edit_instock',[$item->id]) !!}"><i class="fa fa-plus"></i> Add</a></td>
                                                
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
                                        <th > ID</th>
                                        <th > Part Name </th>

                                        <th > Barcode</th>
                                        <th > No </th>
                                        <th > Loc. </th>
                                        <th > Detail </th>
                                        <th > Q'ty </th>
                                        <th > Up </th>
                                        <th > Act. </th>
                                </tr>
                                </thead>
                                <tfoot>
                                </tfoot>
                                <tbody>
                                      @foreach(Cart::instance('editInstock')->content() as $item)
                                        <tr class="odd gradeX">
                                           {!! Form::open(['method' => 'POST','url' => [ 'admin/instock/create/edit/update-edit-instock', $item->id]]) !!}
                                        <td style="width:2%" ></td>
                                        <td style="width:5%"> {{$item->id}}</td>
                                        <td style="width:15%">{{$item->name}}</td>

                                        <td style="width:25%">
                                                <input type="text" name="belongto" value="{{$item->options->belongto}}" style="width:80%"/></td>
                                            <td style="width:5%" >
                                                <input type="text" name="number" value="{{$item->options->number}}" style="width:100%" /></td>
                                            <td style="width:5%" >
                                                    <input type="text" name="location" value="{{$item->options->location}}" style="width:100%" /></td>
                                            <td style="width:20%" >
                                                <input type="text" name="detail" value="{{$item->options->detail}}" style="width:100%"/></td>
                                            <td style="width:5%" >
                                                    <input type="number" name="qty" value="{{$item->qty}}"  style="width:80%" />
                                            </td>
                                            <td style="width:7%" >
                                                    <input type="submit" value="Update" style="width:100%"/>
                                            </td >
                                            @if(Cart::instance('editInstock')->content()->count()>1)
                                             <td style="width:7%"><a onclick="return confirm('Are you sure to delete this part ?')" href="{{ url('admin/instock/create/edit/delete/'.$item->id) }}">Delete </a> <br/></td>
                                            @else
                                                <td style="width:7%"><button onclick="return confirm('You can\'t delete this, must add  one more part before delete it')">Delete </button> <br/></td>
                                            @endif
                                         {!! Form::close() !!}
                                      </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>

   
    {!! Form::model($in_stocks, ['method'=>'PATCH','files'=>'true','url'=>['admin/instock/create/edit',$in_stocks->id], 'role'=>'form']) !!}
    @include('admin.stock.form_edit')
    {!! Form::close() !!}

@endsection