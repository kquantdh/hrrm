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
                                {!! Form::select('job_type',['1'=>'Quotation','2'=>'Q&P',
                                '3'=>'Q&S','4'=>'Q&P&S','5'=>'Q&P&S&H','6'=>'No Quotation'
                                ],null,['class'=>'form-control'])!!}

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
                                'Repair Done'=>'Repair Done','Delivery'=>'Delivery'],null,['class'=>'form-control'])!!}

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
                                {!! Form::select('nature_service',['Package'=>'Package','FOC'=>'FOC','Warranty'=>'Warranty'],null,["class"=>"form-control"]) !!}
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
                                {!!Form::text('head_serial',null,['class'=>'form-control','placeholder'=>'']) !!}
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


                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Service Info</span>
                        </div>
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">Entry Qty

                                </label>
                                <div class="col-md-9">
                                    {!!Form::text('entry',null,['class'=>'form-control','placeholder'=>'']) !!}
                                    {!! $errors->first('entry','<span style="color:red">:message</span>') !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">Engineer Amount

                                </label>
                                <div class="col-md-9">
                                    {!!Form::text('person_amount',null,['class'=>'form-control','placeholder'=>'']) !!}
                                    {!! $errors->first('person_amount','<span style="color:red">:message</span>') !!}
                                </div>
                            </div>
                        </div>


                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">Normal Hrs

                                </label>
                                <div class="col-md-9">
                                    {!!Form::text('normal_hrs',null,['class'=>'form-control','placeholder'=>'']) !!}
                                    {!! $errors->first('normal_hrs','<span style="color:red">:message</span>') !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">Night Hrs

                                </label>
                                <div class="col-md-9">
                                    {!!Form::text('night_hrs',null,['class'=>'form-control','placeholder'=>'']) !!}
                                    {!! $errors->first('night_hrs','<span style="color:red">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">Offday Hrs

                                </label>
                                <div class="col-md-9">
                                    {!!Form::text('off_hrs',null,['class'=>'form-control','placeholder'=>'']) !!}
                                    {!! $errors->first('off_hrs','<span style="color:red">:message</span>') !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">Holiday Hrs

                                </label>
                                <div class="col-md-9">
                                    {!!Form::text('holiday_hrs',null,['class'=>'form-control','placeholder'=>'']) !!}
                                    {!! $errors->first('holiday_hrs','<span style="color:red">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">Discount Service

                                </label>
                                <div class="col-md-9">
                                    {!!Form::text('discount',null,['class'=>'form-control','placeholder'=>'']) !!}
                                    {!! $errors->first('discount','<span style="color:red">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        <!--/span-->


                        <!--/span-->
                    </div>

                        <!--/span-->
                    </div>


                </div>

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


            </div>
            <!--/row-->


            <div class="form-actions">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <div class="btn-group">
                                <a href="{{ url('admin/fujiservice/create_more_service') }}" id="sample_editable_1_2_new" class="btn sbold yellow">More
                                </a>
                            </div>
                                <button type="button" class="btn default">Cancel</button>

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
  