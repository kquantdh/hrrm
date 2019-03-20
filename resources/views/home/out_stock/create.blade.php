@extends('layouts.home')
@section('title')Create Out Stock @endsection
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase">FMV STOCK </span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    @if(Session::has('out_of_stock'))
                                        <div class="container margin-top-10">
                                            <div class="col-sm-12">
                                                <div class="alert alert-warning red">
                                                    <b>{{ Session::get('out_of_stock') }}</b>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif(Session::has('fail'))

                                        <div class="container margin-top-10">
                                            <div class="col-sm-12">
                                                <div class="alert alert-warning red">
                                                    <b>{{ Session::get('fail') }}</b>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                    @endif
                                    <div class="col-md-6">
                                        {!! Form::open(['method'=>'GET','url'=>'home/outstock/create']) !!}
                                        {!!Form::label('sample_file','Typing :',['class'=>'col-md-3'])!!}
                                        {!! Form::text('keyword',null,["id"=>"input-text1"]) !!}
                                        <input name="fieldChoose" type="radio"  value="part_id" >Part No
                                        <input name="fieldChoose" type="radio" value="name"  > Part name
                                        {!! Form::submit('Search',["id"=>"input-bt",'class'=>'btn sbold green']) !!}
                                        {!! Form::close() !!}
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
                                                    <a href="{{ url('home/fujiservice/report/') }}">
                                                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="">
                                <thead>
                                <tr>
                                    <th> No </th>
                                    <th > Part No </th>
                                    <th > Part Name </th>
                                    <th > Belong to</th>
                                    <th > Barcode </th>
                                    <th > Location </th>
                                    <th> Balance </th>
                                    <th > Quantity </th>
                                    <th> Invoice</th>
                                    <th> PO</th>
                                    <th> In date</th>
                                    <th> Thumbnail</th>
                                    <th> Action</th>


                                </tr>
                                </thead>
                                <tfoot>


                                </tfoot>
                                <tbody>
                                @if(isset($in_stock_details))
                                    @foreach($in_stock_details as $item)
                                        <tr class="odd gradeX">
                                            <td> {{($stt++)+1}} </td>
                                            <td>{{$item->part_id}}</td>
                                            <td>{{$item->part_price_list->name}}</td>
                                            <td>{{$item->belongto}}</td>
                                            <td>{{$item->barcode}}</td>
                                            <td>{{$item->location}}</td>
                                            @if(($item->balance)!=($item->quantity))
                                                <td style="color: red;font-weight: bold">{{$item->balance}}</td>
                                            @else
                                                <td style="font-weight: bold">{{$item->balance}}</td>
                                            @endif
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$item->in_stock->inv_no}}</td>
                                            <td>{{$item->in_stock->po_no}}</td>
                                            <td>{{date('d-m-Y',strtotime($item->in_stock->in_date))}}</td>
                                            <td>
                                                <div>
                                                    <img src="{{url('/uploads/product/'.$item->thumbnail)}}"
                                                         width="50px"
                                                         height="50px" alt="No Image">
                                                </div>



                                            </td>

                                            <td><a title="Add to Cart" href="{!! url('home/outstock',[$item->barcode]) !!}"><i class="fa fa-plus"></i> Out</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>

                            </table>
                            @if($in_stock_details->links())
                                {!! $in_stock_details->links() !!}
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
                                <span class="caption-subject bold uppercase"> List for out stock</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_2">
                                <thead>
                                <tr>
                                    <th > </th>
                                    <th class="numeric"> Part Number</th>
                                    <th class="numeric"> Part Name </th>
                                    <th class="numeric"> Belong to </th>
                                    <th class="numeric"> Barcode </th>
                                    <th class="numeric"> Location </th>
                                    <th class="numeric"> Q'ty </th>
                                    <th class="numeric"> Action </th>
                                </tr>
                                </thead>

                                <tbody>
                                @if(Cart::instance('outstock')->count() > 0)
                                    @foreach(Cart::instance('outstock')->content() as  $item)
                                        <tr class="odd gradeX">
                                            {!! Form::open(['method' => 'POST','url' => [ 'home/outstock/create/updatecart', $item->id]]) !!}
                                            <td class="center"></td>
                                            <td class="center">{{$item->options->part_no}}</td>
                                            <td class="center">{{$item->name}}</td>
                                            <td class="center">{{$item->options->belongto}}</td>
                                            <td class="center">{{$item->id}}</td>
                                            <td class="center">{{$item->options->location}}</td>




                                            <td class="center">

                                                <input type="number" name="qty" value="{{$item->qty}}" width="5" maxlength="2"/>
                                                <input type="submit" value="Update"/>
                                                {!! Form::close() !!}
                                            </td>


                                            <td><a href="{{ url('home/outstock/create/deleteoutstock/'.$item->id) }}">Delete </a> <br/></td>
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
    </div>
{!! Form::open(['type'=>'POST','url'=>'home/outstock/create', 'files'=>'true', 'role'=>'form']) !!}
@include('home.out_stock.form')
{!! Form::close() !!}
    
    <!-- END PAGE CONTENT BODY -->
    <!-- END CONTENT BODY -->

@endsection