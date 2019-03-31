
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-line boxless tabbable-reversed">

                        <div class="tab-content">


                            <div class="tab-pane active" id="tab_2">
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-gift"></i>@yield('formName') </div>
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
                                                <h3 class="form-section">Customer Info</h3>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}"></div>
                                                            <label class="control-label col-md-3">Customer
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <div class="col-md-9">
                                                                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'']) !!}
                                                                <span class="help-block"> Typing Name of customer. </span>
                                                                {!! $errors->first('name','<span style="color:red">:message</span>') !!}


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="form-group {{ $errors->has('full_name') ? 'has-error' : ''}}"></div>
                                                            <label class="control-label col-md-3">Customer Full Name
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <div class="col-md-9">
                                                                {!! Form::text('full_name',null,['class'=>'form-control','placeholder'=>'']) !!}
                                                                <span class="help-block"> Typing  Full Name of customer. </span>
                                                                {!! $errors->first('full_name','<span style="color:red">:message</span>') !!}


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                                <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}"></div>
                                                            <label class="control-label col-md-3">Address
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <div class="col-md-9">
                                                                {!! Form::text('address',null,['class'=>'form-control','placeholder'=>'']) !!}
                                                                <span class="help-block"> Typing Address. </span>
                                                                {!! $errors->first('address','<span style="color:red">:message</span>') !!}


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                                <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}"></div>
                                                            <label class="control-label col-md-3">Mobile
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <div class="col-md-9">
                                                                {!! Form::text('mobile',null,['class'=>'form-control','placeholder'=>'']) !!}
                                                                <span class="help-block"> Typing Mobile. </span>
                                                                {!! $errors->first('mobile','<span style="color:red">:message</span>') !!}


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                                <div class="form-group {{ $errors->has('person') ? 'has-error' : ''}}"></div>
                                                            <label class="control-label col-md-3">PIC
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <div class="col-md-9">
                                                                {!! Form::text('person',null,['class'=>'form-control','placeholder'=>'']) !!}

                                                                <span class="help-block"> Typing PIC. </span>
                                                                {!! $errors->first('person','<span style="color:red">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                    <div class="form-group {{ $errors->has('transport_price') ? 'has-error' : ''}}"></div>
                                                                <label class="control-label col-md-3">Transport fee
                                                                    <span class="required" aria-required="true"> * </span>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    {!! Form::text('transport_price',null,['class'=>'form-control','placeholder'=>'']) !!}
    
                                                                    <span class="help-block"> Typing Transport fee. </span>
                                                                    {!! $errors->first('transport_price','<span style="color:red">:message</span>') !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                        <div class="form-group {{ $errors->has('jpy_rate') ? 'has-error' : ''}}"></div>
                                                                    <label class="control-label col-md-3">JPY rate
                                                                        <span class="required" aria-required="true"> * </span>
                                                                    </label>
                                                                    <div class="col-md-9">
                                                                        {!! Form::text('jpy_rate',null,['class'=>'form-control','placeholder'=>'']) !!}
        
                                                                        <span class="help-block"> Typing JPY rate. </span>
                                                                        {!! $errors->first('jpy_rate','<span style="color:red">:message</span>') !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="form-group {{ $errors->has('usd_rate') ? 'has-error' : ''}}"></div>
                                                            <label class="control-label col-md-3">USD rate</label>
                                                            <div class="col-md-9">
                                                                {!! Form::text('usd_rate',null,['class'=>'form-control','placeholder'=>'']) !!}

                                                                <span class="help-block"> Typing USD rate. </span>
                                                                {!! $errors->first('usd_rate','<span style="color:red">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/row-->
                                                        <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                            <div class="form-group {{ $errors->has('normal_hrs') ? 'has-error' : ''}}"></div>
                                                                        <label class="control-label col-md-3">Normal Hrs</label>
                                                                        <div class="col-md-9">
                                                                            {!! Form::text('normal_hrs',null,['class'=>'form-control','placeholder'=>'']) !!}
            
                                                                            <span class="help-block"> Typing service charge for normal hours. </span>
                                                                            {!! $errors->first('normal_hrs','<span style="color:red">:message</span>') !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="form-group {{ $errors->has('night_hrs') ? 'has-error' : ''}}"></div>
                                                            <label class="control-label col-md-3">Night Hrs</label>
                                                            <div class="col-md-9">
                                                                {!! Form::text('night_hrs',null,['class'=>'form-control','placeholder'=>'']) !!}

                                                                <span class="help-block"> Typing service charge for night hours. </span>
                                                                {!! $errors->first('night_hrs','<span style="color:red">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="form-group {{ $errors->has('off_hrs') ? 'has-error' : ''}}"></div>
                                                            <label class="control-label col-md-3">Offday Hrs</label>
                                                            <div class="col-md-9">
                                                                {!! Form::text('off_hrs',null,['class'=>'form-control','placeholder'=>'']) !!}

                                                                <span class="help-block"> Typing service charge for offday hours. </span>
                                                                {!! $errors->first('off_hrs','<span style="color:red">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="form-group {{ $errors->has('holiday_hrs') ? 'has-error' : ''}}"></div>
                                                            <label class="control-label col-md-3">Holiday Hrs</label>
                                                            <div class="col-md-9">
                                                                {!! Form::text('holiday_hrs',null,['class'=>'form-control','placeholder'=>'']) !!}

                                                                <span class="help-block"> Typing service charge for holiday hours. </span>
                                                                {!! $errors->first('holiday_hrs','<span style="color:red">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/row-->



                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">Submit</button>
                                                                <button type="button" class="btn default">Cancel</button>
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
      