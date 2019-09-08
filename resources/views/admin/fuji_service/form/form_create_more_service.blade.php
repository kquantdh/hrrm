@extends('admin.fuji_service.form.form')
@section('form_more_service')
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
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3">Engineer name

                    </label>
                    <div class="col-md-9">
                        {!!Form::text('engineer_name',null,['class'=>'form-control','placeholder'=>'']) !!}
                        {!! $errors->first('discount','<span style="color:red">:message</span>') !!}
                    </div>
                </div>
            </div>

            <!--/span-->
        </div>

        <!--/span-->
    </div>

@endsection
@section('form_time')
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase"> Service Time</span>
            </div>
        </div>
        <!--/row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-3 control-label">Date SR start</label>
                    <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd  HH:ii:ss" data-link-field="dtp_input1">
                        {!! Form::text('date_time_sr_start',null,['class'=>'form-control','placeholder'=>'']) !!}

                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
                <!--/span-->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-3 control-label">Date SR end</label>
                    <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd  HH:ii:ss" data-link-field="dtp_input1">
                        {!! Form::text('date_time_sr_end',null,['class'=>'form-control','placeholder'=>'']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
                <!--/span-->
            </div>
            <!--/span-->
        </div>
        <!--/row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-3 control-label">Date 1 From</label>
                    <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd  HH:ii:ss" data-link-field="dtp_input1">
                        {!! Form::text('date_time_1_from',null,['class'=>'form-control','placeholder'=>'']) !!}

                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
                <!--/span-->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-3 control-label">Date 1 To</label>
                    <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd  HH:ii:ss" data-link-field="dtp_input1">
                        {!! Form::text('date_time_1_to',null,['class'=>'form-control','placeholder'=>'']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
                <!--/span-->
            </div>
            <!--/span-->
        </div>
        <!--/row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-3 control-label">Date 2 From</label>
                    <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd  HH:ii:ss" data-link-field="dtp_input1">
                        {!! Form::text('date_time_2_from',null,['class'=>'form-control','placeholder'=>'']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
                <!--/span-->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-3 control-label">Date 2 To</label>
                    <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd  HH:ii:ss" data-link-field="dtp_input1">
                        {!! Form::text('date_time_2_to',null,['class'=>'form-control','placeholder'=>'']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
                <!--/span-->
            </div>



            <!--/span-->
        </div>
        <!--/row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-3 control-label">Date 3 From</label>
                    <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd  HH:ii:ss" data-link-field="dtp_input1">
                        {!! Form::text('date_time_3_from',null,['class'=>'form-control','placeholder'=>'']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
                <!--/span-->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-3 control-label">Date 3 To</label>
                    <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd  HH:ii:ss" data-link-field="dtp_input1">
                        {!! Form::text('date_time_3_to',null,['class'=>'form-control','placeholder'=>'']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
                <!--/span-->
            </div>



            <!--/span-->
        </div>
        <!--/row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-3 control-label">Date 4 From</label>
                    <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd  HH:ii:ss" data-link-field="dtp_input1">
                        {!! Form::text('date_time_4_from',null,['class'=>'form-control','placeholder'=>'']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
                <!--/span-->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-3 control-label">Date 4 To</label>
                    <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd  HH:ii:ss" data-link-field="dtp_input1">
                        {!! Form::text('date_time_4_to',null,['class'=>'form-control','placeholder'=>'']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
                <!--/span-->
            </div>



            <!--/span-->
        </div>
        <!--/row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-3 control-label">Date 5 From</label>
                    <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd  HH:ii:ss" data-link-field="dtp_input1">
                        {!! Form::text('date_time_5_from',null,['class'=>'form-control','placeholder'=>'']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
                <!--/span-->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-3 control-label">Date 5 To</label>
                    <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd  HH:ii:ss" data-link-field="dtp_input1">
                        {!! Form::text('date_time_5_to',null,['class'=>'form-control','placeholder'=>'']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
                <!--/span-->
            </div>



            <!--/span-->
        </div>
        <!--/row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-3 control-label">Date 6 From</label>
                    <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd  HH:ii:ss" data-link-field="dtp_input1">
                        {!! Form::text('date_time_6_from',null,['class'=>'form-control','placeholder'=>'']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
                <!--/span-->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-3 control-label">Date 6 To</label>
                    <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd  HH:ii:ss" data-link-field="dtp_input1">
                        {!! Form::text('date_time_6_to',null,['class'=>'form-control','placeholder'=>'']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
                <!--/span-->
            </div>



            <!--/span-->
        </div>
        <!--/row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-3 control-label">Date 7 From</label>
                    <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd  HH:ii:ss" data-link-field="dtp_input1">
                        {!! Form::text('date_time_7_from',null,['class'=>'form-control','placeholder'=>'']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
                <!--/span-->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-3 control-label">Date 7 To</label>
                    <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd  HH:ii:ss" data-link-field="dtp_input1">
                        {!! Form::text('date_time_7_to',null,['class'=>'form-control','placeholder'=>'']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
                <!--/span-->
            </div>



            <!--/span-->
        </div>
        <!--/row-->

    </div>


@endsection