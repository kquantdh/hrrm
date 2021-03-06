@extends('layouts.guest')
@section('title') FMV JOB MANAGEMENT @endsection
@section('content')
  
       

                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase"> FMV Job History</span>
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




                                    </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_2">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th> Job No </th>
                                        <th> Cust. </th>
                                        <th> Type </th>
                                        <th> Quotion</th>
                                        <th> PO</th>
                                        <th> SR No </th>
                                        <th> Invoice</th>
                                        <th> Machine </th>
                                        <th> Serial</th>
                                        <th> Type SR </th>
                                        <th> Status </th>

                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>

                                        
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    @if(isset($fuji_services))
                                        @foreach($fuji_services as $item)
                                    <tr class="odd gradeX">
                                        <td>
                                            
                                        </td>
                                        <td>J{{ date('y', strtotime($item->created_at))}}{{str_pad($item->id, 4, '0',STR_PAD_LEFT)}}
                                        </td>
                                        <td class="center"> {{$item->customer->name}}  </td>
                                        <td >
                                            @switch($item->job_type)
                                            @case('1')
                                            Q&P
                                            @break
                                            @case('2')
                                            Q&S
                                            @break
                                            @case('3')
                                            Q&P&S
                                            @break
                                            @case('4')
                                            Q&P&S&H
                                            @break
                                            @case('5')
                                            No Q&P
                                            @break
                                            @case('6')
                                            No Q&S
                                            @case('7')
                                            No Q&P&S
                                            @case('8')
                                            No Q&P&S&H
                                            @break
                                            @endswitch
                                        </td>

                                        <td>{{$item->quotation}}</td>
                                        <td>{{$item->po}}</td>
                                        <td>{{$item->sr_no}}</td>
                                        <td>{{$item->invoice}}</td>
                                        <td class="center"> {{$item->head_type->name}} </td>
                                        <td class="center"> {{$item->head_serial}}</td>
                                        <td class="center"> {{$item->nature_service}} </td>
                                        @switch($item->status)
                                        @case('Stock Recieve')
                                        <td style="color: red;font-weight: bold">
                                            {{$item->status}}
                                        </td>
                                        @break
                                        @case('Start Inspection')
                                        <td  style="color:#ffdf09;font-weight: bold">
                                            {{$item->status}}
                                        </td>
                                        @break

                                        @case('Inspection Done')
                                        <td style="color:#ff20ee;font-weight: bold">
                                            {{$item->status}}
                                        </td>
                                        @break
                                        @case('Sent Quotation')
                                        <td style="color:chocolate;font-weight: bold">
                                            {{$item->status}}
                                        </td>
                                        @break
                                        @case('Got PO')
                                        <td style="color:black;font-weight: bold">
                                            {{$item->status}}
                                        </td>
                                        @break
                                        @case('Got Part')
                                        <td style="color:green;font-weight: bold">
                                            {{$item->status}}
                                        </td>
                                        @break
                                        @case('Repair Done')
                                        <td style="color:chartreuse;font-weight: bold">
                                            {{$item->status}}
                                        </td>
                                        @break
                                        @case('Delivery')
                                        <td style="color:#edff0a;font-weight: bold">
                                            {{$item->status}}
                                        </td>
                                        @break
                                        @case('Got SR')
                                        <td style="color: blue;font-weight: bold">
                                            {!! $item->status !!}
                                        </td>
                                        @break
                                        @endswitch


                                        @endforeach

                                    @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>

         
  

@endsection