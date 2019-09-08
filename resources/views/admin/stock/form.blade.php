<!-- BEGIN PAGE CONTENT INNER -->
<div class="portlet-body form">
    <!-- BEGIN FORM-->
        <div class="form-body">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Basic Info For In Stock</span>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Invoice No</label>
                        <div class="col-md-9">
                            {!! Form::text('inv_no',null,['class'=>'form-control','placeholder'=>'']) !!}
                            {!! $errors->first('inv_no','<span style="color:red">:message</span>') !!}
                        </div>
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">PO No</label>
                        <div class="col-md-9">
                            {!! Form::text('po_no',null,['class'=>'form-control','placeholder'=>'']) !!}
                            {!! $errors->first('po_no','<span style="color:red">:message</span>') !!}
                        </div>
                    </div>
                </div></div>

                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Note for In Stock</span>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label class="control-label col-md-3">Remark</label>
                            <div class="col-md-9">
                                {!! Form::textarea('remark', null, ['class' => 'form-control ckeditor', 'data-required' => '1']) !!}
                                {!! $errors->first('remark','<span style="color:red">:message</span>') !!}
                            </div>
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
                            <button type="submit" class="btn green">Submit
                            </button>
                            <a type="button" href="{{ url('/admin/instock/')}}" class="btn default">Cancel</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>

    <!-- END FORM-->
        </div></div>