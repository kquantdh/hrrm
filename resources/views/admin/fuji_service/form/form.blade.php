
<!-- BEGIN PAGE CONTENT INNER -->
<div class="portlet-body form">
    <!-- BEGIN FORM-->
        <div class="form-body">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Basic Info</span>
                    </div>
                </div>
                <!--/row-->
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Job subject
                                <span class="required" aria-required="true"> * </span></label>
                            <div class="col-md-9">
                                {!! Form::text('job_subject',null,['class'=>'form-control','placeholder'=>'']) !!}
                                {!! $errors->first('job_subject','<span style="color:red">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Transfer head
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-9">
                                {!! Form::select('transfer_head_time',['0'=>'By customer','1'=>'1 TRIP','2'=>'2 TRIP'
                                ],null,['class'=>'form-control'])!!}
                            </div>
                        </div>
                    </div>

                    <!--/span-->
                </div>
                <!--/row-->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Customer
                                <span class="required" aria-required="true"> * </span></label>
                            <div class="col-md-9">
                                {!! Form::select('customer_id',$customers,null,["class"=>"form-control"]) !!}
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Job Type
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-9">
                                {!! Form::select('job_type',['1'=>'Q&P','2'=>'Q&S','3'=>'Q&P&S','4'=>'Q&P&S&H',
                                                             '5'=>'No Q&P','6'=>'No Q&S','7'=>'No Q&P&S','8'=>'No Q&P&S&H'],null,['class'=>'form-control'])!!}

                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Status
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-9">
                                {!! Form::select('status',['Stock Recieve'=>'Stock Recieve','Start Inspection'=>'Start Inspection',
                                'Inspection Done'=>'Inspection Done','Sent Quotation'=>'Sent Quotation','Got PO'=>'Got PO','Got Part'=>'Got Part',
                                'Repair Done'=>'Repair Done','Delivery'=>'Delivery','Got SR'=>'Got SR'],null,['class'=>'form-control'])!!}

                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Currency
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-9">
                                {!! Form::select('currency',['JPY'=>'JPY','USD'=>'USD',
                                ],null,['class'=>'form-control'])!!}
                            </div>
                        </div>
                    </div>

                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">

                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Type SR
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-9">
                                {!! Form::select('nature_service',['PKG'=>'PKG','FOC'=>'FOC','WRT'=>'WRT','SGL'=>'SGL'],null,["class"=>"form-control"]) !!}
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Discount Part

                            </label>
                            <div class="col-md-9">
                                {!!Form::text('discount_part',null,['class'=>'form-control','placeholder'=>'']) !!}
                                {!! $errors->first('discount_part','<span style="color:red">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!--/row-->
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Quotation</label>
                            <div class="col-md-9">
                                {!! Form::text('quotation',null,['class'=>'form-control','placeholder'=>'']) !!}
                                {!! $errors->first('quotation','<span style="color:red">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">SR No.</label>
                            <div class="col-md-9">
                                {!! Form::text('sr_no',null,['class'=>'form-control','placeholder'=>'']) !!}
                                {!! $errors->first('sr_no','<span style="color:red">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">

                    <!--/span-->

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">PO </label>
                            <div class="col-md-9">
                                {!! Form::text('po',null,['class'=>'form-control','placeholder'=>'']) !!}
                                {!! $errors->first('po','<span style="color:red">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Invoice</label>
                            <div class="col-md-9">
                                {!! Form::text('invoice',null,['class'=>'form-control','placeholder'=>'']) !!}
                                {!! $errors->first('invoice','<span style="color:red">:message</span>') !!}
                            </div>
                        </div>
                    </div>

                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Serial</label>
                            <div class="col-md-9">
                                {!!Form::text('head_serial',null,['class'=>'form-control','placeholder'=>'Ex: HZ0D1 007736']) !!}
                                {!! $errors->first('head_serial','<span style="color:red">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Machine
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-9">
                                {!! Form::select('head_type_id',$head_types,null,["class"=>"form-control"]) !!}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Discount Head</label>
                            <div class="col-md-9">
                                {!!Form::text('discount_head',null,['class'=>'form-control','placeholder'=>'Ex VND: 1000000']) !!}
                                {!! $errors->first('discount_head','<span style="color:red">:message</span>') !!}
                            </div>
                        </div>
                    </div>


                </div>
                </div>
            @yield('form_more_service')
            @yield('form_time')

                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Detail</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Problem</label>
                            <div class="col-md-9">
                                {!! Form::textarea('problem', null, ['class' => 'form-control ckeditor', 'data-required' => '1']) !!}
                                {!! $errors->first('problem','<span style="color:red">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <!--/row-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Countermeasure</label>
                            <div class="col-md-9">
                                {!! Form::textarea('countermeasure', null, ['class' => 'form-control ckeditor', 'data-required' => '1']) !!}
                                {!! $errors->first('countermeasure','<span style="color:red">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Countermeasure Report</label>
                        <div class="col-md-9">
                            {!! Form::textarea('countermeasure_report', null, ['class' => 'form-control ckeditor', 'data-required' => '1']) !!}
                            {!! $errors->first('countermeasure_report','<span style="color:red">:message</span>') !!}
                        </div>
                    </div>
                </div>
                <!--/row-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3" style="color: red">FMV Note</label>
                        <div class="col-md-9">
                            {!! Form::textarea('fmv_note', null, ['class' => 'form-control ckeditor', 'data-required' => '1']) !!}
                            {!! $errors->first('fmv_note','<span style="color:red">:message</span>') !!}
                        </div>
                    </div>
                </div>
            </div>


            </div>
            <!--/row-->


            <div class="form-actions">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green")>Submit</button>
                                    @yield('form_service')
                                <a href="{{ url('admin/fujiservice') }}" class="btn default"> Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
    <!-- END FORM-->
</div>
</div>

<!-- END PAGE CONTENT INNER -->
