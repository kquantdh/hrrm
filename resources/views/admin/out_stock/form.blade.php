<div class="portlet-body form">
    <!-- BEGIN FORM-->

        <div class="form-body">

            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Basic Info for Out Stock</span>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Type Form</label>
                        <div class="col-md-9">
                            {!! Form::select('type_form',['P'=>'PRF','PR'=>'PRF & RD','PLR'=>'PRF & LF & RD'],null,["class"=>"form-control"]) !!}
                            <span class="help-block"> P : Part Request, L : Loan, R: Reciept Delivery </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Customer</label>
                        <div class="col-md-9">
                            {!! Form::select('customer_id',$customers,null,["class"=>"form-control"]) !!}
                        </div>
                    </div>
                </div>
                <!--/span-->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Loan date number</label>
                        <div class="col-md-9">
                            {!! Form::text('loan_date_no',null,["class"=>"form-control","placeholder"=>"Only typing date amount"]) !!}
                            {!! $errors->first('loan_date_no','<span style="color:red">:message</span>') !!}
                        </div>
                    </div>
                </div>
            </div></div>
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Note for Out Stock</span>
                        </div>
                    </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label class="control-label col-md-3">Remark</label>
                        <div class="col-md-9">
                            {!! Form::textarea('remark', null, ['class' => 'form-control ckeditor', 'data-required' => '1']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">Submit</button>
                            <a type="button" href="{{ url('/admin/outstock/')}}" class="btn default">Cancel</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>

            </div></div></div>