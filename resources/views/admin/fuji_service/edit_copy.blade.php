@extends('layouts.admin')
@section('title') Copy Job History @endsection
@section('level1') Copy @endsection
@section('formName') Edit Job history @endsection
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
                                                @if(Session::has('fail'))
                                                    <div class="container margin-top-10">
                                                        <div class="col-sm-12">
                                                            <div class="alert alert-warning red">
                                                                <b>{{ Session::get('fail') }}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif(Session::has('success'))

                                                    <div class="container margin-top-10">
                                                        <div class="col-sm-12">
                                                            <div class="alert alert-warning red">
                                                                <b>{{ Session::get('fail') }}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                @endif
                                            </div>
                                            <div class="row">




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
                                    <th class="numeric"> Repnews </th>
                                    <th class="numeric"> Machine</th>
                                    <th class="numeric"> VN name  </th>
                                    <th class="numeric"> Material </th>
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
                                        <td class="center">{!! $item->rep_new!!}</td>
                                        <td class="center">{{$item->machine}}</td>
                                        <td class="center"> {{$item->vn_name}}</td>
                                        <td class="center"> {{$item->material}} </td>


                                            <td><a title="Add to Cart" href="{!! url('edit_muahang_copy',[$item->id]) !!}"><i class="fa fa-plus"></i> Add</a>
                                                
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
                                    <th>  </th>
                                    <th> Part No </th>
                                    <th> Part Name </th>
                                    <th> Repnews </th>
                                    <th> Imp_ tax</th>
                                    <th> Add_ Fee </th>
                                    <th> Q'ty </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tfoot>
                                </tfoot>
                                <tbody>
                                @if(Cart::instance('editFujiServiceCopy')->count() > 0)
                                    @foreach(Cart::instance('editFujiServiceCopy')->content() as  $item)
                                        <tr class="odd gradeX">
                                            {!! Form::open(['method' => 'POST','url' => [ 'admin/fujiservice/create/edit/update-edit-cart-copy', $item->id]]) !!}
                                                <td class="center"></td>
                                            <td class="center"> {{$item->id}} </td>
                                            <td class="center">{{$item->name}} </td>
                                            <td class="center"> {!! $item->options->rep_new !!}</td>

                                            <td style="width:5%" >
                                                <input type="number" name="import_tax" value="{{$item->options->import_tax}}" style="width:100%" /></td>
                                            <td style="width:5%" >
                                                <input type="number" name="additional_fee" value="{{$item->options->additional_fee}}" style="width:100%" /></td>
                                            <td  style="width:15%">


                                                <input type="number" name="qty" value="{{$item->qty}}"   style="width:25%"/>
                                                <input type="submit" value="Update"  style="width:35%"/>
                                                {!! Form::close() !!}
                                            </td>
                                            <td><a href="{{ url('admin/fujiservice/create/edit/delete-copy/'.$item->id) }}">Delete </a> <br/></td>
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

    
    {!! Form::model($fuji_service, ['method'=>'PUT','files'=>'true','url'=>['admin/fujiservice/create/edit-copy',$fuji_service->id], 'role'=>'form']) !!}
    @include('admin.fuji_service.form.form_edit_copy')
    {!! Form::close() !!}

@endsection