@extends('layouts.admin')
@section('title') Detail All  @endsection
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

                                <span class="caption-subject bold uppercase"> Detail Out : </span>


                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_7">
                                <thead>
                                <tr>
                                    <th> No</th>
                                    <th> Part out No</th>
                                    <th> User out</th>
                                    <th > Part No </th>
                                    <th > Status </th>



                                    <th > Out Qty </th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>

                                    <th></th>

                                </tr>
                                </tfoot>

                                <tbody>

                                @if(isset($out_stock_details))
                                    @foreach($out_stock_details as $key=> $item)
                                        <tr class="odd gradeX">
                                            <td>{{$key+1}}</td>
                                            <td>PR{{str_pad($item->id, 4, '0',STR_PAD_LEFT)}}</td>
                                            <td>{{$item->user->name}}</td>
                                            <td>{{$item->in_stock_detail->part_id}}</td>
                                            @if($item->status==3)
                                                <td style="max-width: 50px;overflow: hidden; white-space: nowrap;color: red;font-weight: bold ">
                                                    Processing
                                                </td>
                                            @elseif($item->status==4)
                                                <td style="max-width: 50px;overflow: hidden; white-space: nowrap;color: Black;font-weight: bold ">
                                                    Take out
                                                </td>
                                            @else
                                                <td style="max-width: 50px;overflow: hidden; white-space: nowrap;color: Blue;font-weight: bold ">
                                                    Returned
                                                </td>
                                            @endif

                                            <td>{{$item->out_quantity}}</td>
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
    </div>
    </div>

@endsection