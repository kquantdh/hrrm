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
@section('script')
    <script >


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#date-from').datepicker({
                autoclose: true,
                dateFormat: 'yy-mm-dd'
            }).datepicker("setDate", new Date())

            // check all

            $(document).on('change', '#check-all', function () {
                var c = this.checked;
                $('.phone-check:checkbox').prop('checked',c);
            });

        });
        $(document).ready(function () {
            $('#date-to').datepicker({
                autoclose: true,
                dateFormat: 'yy-mm-dd'
            }).datepicker("setDate", new Date())
        });

        //datatable
        var tableListPhone = $('#phone-list').DataTable( {
            pagingType: "full_numbers",
            ordering:true,
            info:false,
            dom: 'Bfrtip',
            language: {
                "paginate": {
                    "first":"Đầu",
                    "previous": "Trước",
                    "next":"Tiếp",
                    "last":"cuối"
                },
                "sLengthMenu": "Xem _MENU_ bản ghi",
                "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
                'sSearchPlaceholder':'Tìm kiếm',
                processing: "<div id='divloader'></div>",
            },
            //responsive: true,
            searching: false,
            lengthMenu: [[50, 100,150, 200, 500, -1], [50, 100,150, 200, 500, 'ALL']],
            ajax: {
                url: '{{URL::route('admin.part_price_list.show_datatable')}}',
                type: 'POST',
                beforeSend:function(){
                },
                data: function ( d ) {
                    d._token = '{{csrf_token()}}';
                    d.status = $('#status option:selected').val();
                    d.phone = $('#phone').val();
                },
                dataSrc:"data",
                complete: function (data) {
                    $('#total-money').html(data.responseJSON.total.money_total)
                    $('#total-money-change').html(data.responseJSON.total.money_total_change)
                },
                error: function (xhr, error, thrown) {
                    $("#divloader").hide();
                }
            },

            "initComplete":function( settings, data){
            },
            "ordering": false,
            columns: [
                {
                    "data":{
                        'id':'id',
                        'status_key':'status_key',
                        'phone':'phone'
                    } ,
                    "name": "checkbox",
                    "orderable": false,
                    "className":"text-center",
                    "render":function (data) {
                        return `<input name="phone-check" type="checkbox" value="`+data.id+`" class="phone-check" name="id[]">`;
                    }

                },
                {
                    "data": "id" ,
                    "name": "id",
                    "className":"text-center"
                },
                {
                    "data": "phone_name" ,
                    "name": "phone",
                    "className":"text-center",
                    "render":function (data) {
                        return `<b>`+data+`</b>`;
                    }
                },
                {
                    "data": "money" ,
                    "name": "money",
                    "className":"text-center",
                    "render":function (data) {
                        return `<b class="text-success">`+data+`</b>`;
                    }
                },
                {
                    "data": "money_change" ,
                    "name": "money_change",
                    "className":"text-center",
                    "render":function (data) {
                        return `<b class="text-danger">`+data+`</b>`;
                    }
                },
                {
                    "data": "status" ,
                    "name": "status",
                    "className":"text-center",
                    "render":function (data) {
                        return `<b class="text-purple">`+data+`</b>`;
                    }
                },
                {
                    "data": "created_user" ,
                    "name": "created_user",
                    "className":"text-center"
                },
                {
                    "data": "created_at" ,
                    "name": "created_at",
                    "className":"text-left"
                },
                {
                    "data":{
                        'id':'id',
                        'status_key':'status_key',
                        'phone':'phone'
                    } ,
                    "name": "action",
                    "className":"text-left",
                    "width":"105px",
                    orderable: false,
                    "render":function (data) {
                        var result=``;
                        if(data.status_key!=-1) {
                            result += `<button class="btn btn-danger btn-sm reject-sim" data-id=` + data.id + ` data-phone=`+data.phone+`>Dừng</button>`
                        } else if(data.status_key==-1) {
                            result +=`<button class="btn btn-success btn-sm open-sim" data-id=` + data.id + ` data-phone=`+data.phone+`>Mở nạp</button>`

                        }
                        result+=` <a href="/log/`+data.phone+`" class="btn btn-warning btn-sm">Log</a>`;
                        return result;
                    }
                }
            ],
            drawCallback : function() {
                if($('#phone-list tbody .dataTables_empty').length){
                    $('#phone-list tbody tr').hide()
                }
                var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                pagination.toggle(this.api().page.info().pages > 1);
            },
            deferRender: true,
        } );

        $(document).on('click', '#btn-search', function () {
            tableListPhone.ajax.reload();
        })

        $(document).on('click', '.reject-sim', function () {
            var id = $(this).data('id');
            var phone =$(this).data('phone');
            var check = confirm("Bạn có muốn dừng nạp SĐT:"+phone+" không?");
            if (check == true) {
                $.ajax({
                    url: '{{URL::route('phone.reject-sim')}}',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function (result) {

                        alert('Dừng nạp sim thành công!');
                        tableListPhone.ajax.reload();
                    },
                    error: function (error) {

                    }
                })
            }
        })
        //open sim
        $(document).on('click', '.open-sim', function () {
            var id = $(this).data('id');
            var phone =$(this).data('phone');
            var check = confirm("Bạn có muốn tiếp tục nạp SĐT:"+phone+" không?");
            if (check == true) {
                $.ajax({
                    url: '{{URL::route('phone.open-sim')}}',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function (result) {
                        alert('Mở nạp sim thành công!');
                        tableListPhone.ajax.reload();
                    },
                    error: function (error) {

                    }
                })
            }
        })

        //stop sim all

        $(document).on('click', '#stop-sim-more', function () {
            var param = $("input[name=phone-check]:checked").map(function() {
                return this.value;
            }).get().join(",");
            if (param=='') {
                alert('Bạn chưa chọn sim cần dừng !');
                return;
            }
            var check = confirm("Bạn có muốn dừng nhiều sim không?");
            if (check == true) {
                $.ajax({
                    url: '{{URL::route('phone.reject-sim-more')}}',
                    type: 'post',
                    data: {
                        param: param
                    },
                    success: function (result) {
                        $("#check-all").prop('checked', false);
                        alert('Dừng nạp sim thành công!');
                        tableListPhone.ajax.reload();
                    },
                    error: function (error) {

                    }
                })
            }
        });
        //open sim all
        $(document).on('click', '#open-sim-more', function () {
            var param = $("input[name=phone-check]:checked").map(function() {
                return this.value;
            }).get().join(",");
            if (param=='') {
                alert('Bạn chưa chọn sim cần mở !');
                return;
            }
            var check = confirm("Bạn có muốn mở nạp nhiều sim không?");
            if (check == true) {
                $.ajax({
                    url: '{{URL::route('phone.open-sim-more')}}',
                    type: 'post',
                    data: {
                        param: param
                    },
                    success: function (result) {
                        $("#check-all").prop('checked', false);
                        alert('Dừng nạp sim thành công!');
                        tableListPhone.ajax.reload();
                    },
                    error: function (error) {

                    }
                })
            }
        });

        $(document).on('click', '#open-delete-sim', function () {
            var param = $("input[name=phone-check]:checked").map(function() {
                return this.value;
            }).get().join(",");
            if (param=='') {
                alert('Bạn chưa chọn sim cần xóa !');
                return;
            }
            var check = confirm("Bạn có muốn xóa sim không?");
            if (check == true) {
                $.ajax({
                    url: '{{URL::route('phone.delete-sim-more')}}',
                    type: 'post',
                    data: {
                        param: param
                    },
                    success: function (result) {
                        $("#check-all").prop('checked', false);
                        alert('Xóa sim thành công!');
                        tableListPhone.ajax.reload();
                    },
                    error: function (error) {

                    }
                })
            }
        });

        //
        $(document).on('click', '#success-sim-more', function () {
            var param = $("input[name=phone-check]:checked").map(function() {
                return this.value;
            }).get().join(",");
            if (param=='') {
                alert('Bạn chưa chọn sim cần chuyển sang trạng thái hoàn thành !');
                return;
            }
            var check = confirm("Bạn có muốn chuyển sang trạng thái hoàn thành  sim không?");
            if (check == true) {
                $.ajax({
                    url: '{{URL::route('phone.success-sim-more')}}',
                    type: 'post',
                    data: {
                        param: param
                    },
                    success: function (result) {
                        $("#check-all").prop('checked', false);
                        alert('Hoàn thành sim thành công!');
                        tableListPhone.ajax.reload();
                    },
                    error: function (error) {

                    }
                })
            }
        });

        // danh sach uu tiên
        $(document).on('click', '#open-ut-sim', function () {
            var param = $("input[name=phone-check]:checked").map(function() {
                return this.value;
            }).get().join(",");
            if (param=='') {
                alert('Bạn chưa chọn sim cần chuyển sang sim ưu tiên !');
                return;
            }
            var check = confirm("Bạn có muốn chuyển sang sim ưu tiên không?");
            if (check == true) {
                $.ajax({
                    url: '{{URL::route('phone.open-ut-sim-more')}}',
                    type: 'post',
                    data: {
                        param: param
                    },
                    success: function (result) {
                        $("#check-all").prop('checked', false);
                        alert('Hoàn thành sim thành công!');
                        tableListPhone.ajax.reload();
                    },
                    error: function (error) {

                    }
                })
            }
        });
        //xóa ưu tiên
        $(document).on('click', '#reject-ut-sim', function () {
            var param = $("input[name=phone-check]:checked").map(function() {
                return this.value;
            }).get().join(",");
            if (param=='') {
                alert('Bạn chưa chọn sim cần xóa ưu tiên !');
                return;
            }
            var check = confirm("Bạn có muốn xóa sim ưu tiên không?");
            if (check == true) {
                $.ajax({
                    url: '{{URL::route('phone.reject-ut-sim-more')}}',
                    type: 'post',
                    data: {
                        param: param
                    },
                    success: function (result) {
                        $("#check-all").prop('checked', false);
                        alert('Hoàn thành sim thành công!');
                        tableListPhone.ajax.reload();
                    },
                    error: function (error) {

                    }
                })
            }
        });



    </script>


@endsection