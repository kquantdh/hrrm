@extends('layouts.home')
@section('title')All stock @endsection
@section('content')

    {!! Form::open(['method' => 'PATCH','url' =>['home/stock/thumbnail',$in_stock_details->barcode], 'role' =>'form', 'files' => true]) !!}
    @if(Session::has('sameName'))
        <div class="alert alert-info">
            <i class="fa fa-folder-open"></i>
            <b>{{Session::get('sameName')}}</b>
        </div>
        @endif

    <div class="row">
        <div class="col-md-12">
            <div class="tabbable-line boxless tabbable-reversed">

                <div class="tab-content">


                    <div class="tab-pane active" id="tab_2">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Upload Thumbnail</div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                    <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                    <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form action="#" class="form-horizontal">
                                    <div class="form-body">
                                        <h3 class="form-section"> Part barcode: {{$in_stock_details->barcode}}</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group {{ $errors->has('thumbnail') ? 'has-error' : ''}}"></div>
                                                    <label class="control-label col-md-3">Thumbnail
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        {!! Form::file('thumbnail',null,['class' => 'form-control', 'data-required' => '1']) !!}
                                                        {!! $errors->first('thumbnail','<span style="color:red">:message</span>') !!}

                                                        <span class="help-block"> Require: jpeg,png,jpg,gif,svg. Max: 2048kB </span>



                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->

                                            <!--/span-->
                                        </div>



                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="btn green">Add thumbnail </button>
                                                        <a type="button" href="{{ url('/home/stock/')}}" class="btn default">Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>







{!! Form::close() !!}
@endsection