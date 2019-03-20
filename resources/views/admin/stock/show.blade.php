@extends('layouts.admin')
@section('title')All stock @endsection
@section('content')
<div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Detail:</h4>
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
                        <span class="caption-subject bold uppercase"> All stock </span>
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
                                  
                             {!! Form::open(['method'=>'GET','url'=>'admin/stock']) !!}
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
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="">
                        <thead>
                        <tr>
                            <th> No </th>
                            <th > Part No </th>
                            <th > Part Name </th>
                            <th > Belong to </th>
                            <th > Barcode </th>
                            <th > Location </th>
                            <th> Balance </th>
                            <th >Quantity </th>
                            <th> Invoice</th>
                            <th> PO</th>
                            <th style="width: 7%"> Detail</th>
                            <th> Thumbnail</th>
                            <th style="width: 40px"> Action</th>
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
                                    <td>{{$item->detail}}</td>
                                   <!-- <td>{{date('d-m-Y',strtotime($item->in_stock->in_date))}}</td>-->
                                    <td>
                                        <div>
                                            <img src="{{url('/uploads/product/'.$item->thumbnail)}}"
                                                 width="100px"
                                                 height="100px" alt="No Image">
                                        </div>
                                    </td>
                                    <td>
                                        <button style="width: 70px" class="btn btn-xs green dropdown-toggle" data-toggle="modal" data-target="#large" class="btn btn-primary"
                                                href="{{url('admin/stock/detail/'.$item->barcode)}}">Show</button>
                                        <a style="width: 70px"  class="btn btn-xs green dropdown-toggle"class="btn btn-xs green dropdown-toggle"  data-target="#large"
                                           href="{{url('admin/stock/detail_all/'.$item->barcode)}}">Show All</a>
                                        <a style="width: 70px"  class="btn btn-xs green dropdown-toggle"class="btn btn-xs green dropdown-toggle"  data-target="#large"
                                                 href="{{url('admin/stock/thumbnail/'.$item->barcode)}}">Thumbnail</a>
                                        <a style="width: 70px" class="btn btn-xs green dropdown-toggle" href="{{ url('admin/one-barcode/'.$item->barcode) }}">QRcode</a>
                                    </td>
                                    
                                    
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


@endsection