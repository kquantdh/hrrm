@extends('layouts.admin')
@section('title') Edit Out Stock @endsection
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
                        <span class="caption-subject bold uppercase">FMV STOCK  </span>
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
                            @endif
                            </div>
                                <div class="row">
                            <div class="col-md-2">
                                        <div class="btn-group">
                                            <a href="{!! url('getoutstock',[$out_stocks->id]) !!}" id="sample_editable_1_2_new" class="btn sbold green"> Get old part out
                                            </a>
                                        </div>
                                    </div>

                            <div class="col-md-2">
                                <div class="btn-group">
                                    <a href="{{ url('admin/outstock/edit/deleteoutstockdetail/'.$out_stocks->id) }}" id="sample_editable_1_2_new" class="btn sbold green">Delete all part
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>


                    <div class="row">
                        <div class="col-lg-12">

                        {!! Form::open(['method'=>'GET','url'=>array('admin/outstock/edit',$out_stocks->id)]) !!}
                        <select  name="belongto" id="country" type="text">
                            <option disabled selected> -- Belong to -- </option>
                            <option value="1FMV">1FMV</option>
                            <option value="1FMA">1FMA</option>
                            <option value="1FMMC">1FMMC</option>
                            <option value="1HCM">1HCM</option>
                            <option value="2FMV">2FMV</option>
                            <option value="2FMA">2FMA</option>
                            <option value="2FMMC">2FMMC</option>
                            <option value="2HCM">2HCM</option>
                            <option value="LOAN">LOAN</option>
                            <option value="FOC">FOC</option>
                        </select>
                        <select  name="whetherBalance" id="country" type="text">
                            <option disabled selected> -- Balance or Not -- </option>
                            <option value="balance">Balance</option>
                            <option value="noBalance">No Balance</option>
                        </select>
                        <input name="fieldChoose" type="radio"  value="part_id" >Part No
                        <input name="fieldChoose" type="radio" value="name"  > Part name
                        <input name="fieldChoose" type="radio" value="barcode"  > Barcode
                        {!! Form::text('keyword1',null,["id"=>"input-text1"]) !!}

                        <input name="fieldChoose" type="radio" value="location"  > Location
                        <input name="fieldChoose" type="radio" value="inv_no"  > Invoice
                        <input name="fieldChoose" type="radio" value="po_no"  > PO
                        {!! Form::text('keyword2',null,["id"=>"input-text1"]) !!}
                        {!! Form::submit('Search',["id"=>"input-bt",'class'=>'btn sbold green']) !!}

                        {!! Form::close() !!}
                        </div>

                    </div>
                        </div>

                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="">
                        <thead>
                        <tr>
                            <th> No </th>
                            <th > Part No </th>
                            <th > Part Name </th>
                            <th > Belong to </th>
                            <th > Barcode </th>
                            <th > Location </th>
                            <th > Balance </th>

                            <th >Quantity</th>
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
                                    
                                    <td><a title="Add to Cart" href="{!! url('edit_outstock',[$item->barcode]) !!}"><i class="fa fa-plus"></i> Out</a></td>
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
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
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
                            <th class="numeric"> </th>
                            <th class="numeric"> Part Number</th>
                            <th class="numeric"> Part Name </th>
                            
                            <th class="numeric"> Barcode </th>
                            <th class="numeric"> Location </th>
                            <th class="numeric"> Q'ty </th>
                            <th class="numeric"> Action </th>
                        </tr>
                        </thead>
                        
                        <tbody>
                        @if(Cart::instance('editOutstock')->count() > 0)
                            @foreach(Cart::instance('editOutstock')->content() as $item)
                                <tr class="odd gradeX">
                                        {!! Form::open(['method' => 'POST','url' => [ 'admin/outstock/edit/update-edit-outstock', $item->id]]) !!}
                                    <td class="center"> </td>
                                    <td class="center">{{$item->options->part_no}}</td>
                                    <td class="center">{{$item->name}}</td>
                                    <td class="center">{{$item->id}}</td>
                                    <td class="center">{{$item->options->location}}</td>

                                    
                                    <td class="center">
                                        
                                        <input type="number" name="qty" value="{{$item->qty}}" width="5" maxlength="2"/>
                                        <input type="submit" value="Update"/>
                                        {!! Form::close() !!}
                                    </td>
                                    @if(Cart::instance('editOutstock')->content()->count()>1)
                                        <td><a href="{{ url('admin/outstock/edit/deleteoutstock/'.$item->id) }}">Delete </a> <br/></td>
                                    @else
                                        <td><button onclick="return confirm('You can\'t delete this, must add  one more part before delete it')">Delete </button> <br/></td>
                                    @endif


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
{!! Form::model($out_stocks, ['method'=>'PATCH','files'=>'true','url'=>['admin/outstock/edit',$out_stocks->id], 'role'=>'form']) !!}
@include('admin.out_stock.form')
{!! Form::close() !!}
    
    <!-- END PAGE CONTENT BODY -->
    <!-- END CONTENT BODY -->

@endsection