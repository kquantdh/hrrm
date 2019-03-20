<div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE CONTENT INNER -->
                            <div class="tab-pane active" id="tab_2">
                                <div class="portlet box">
                                    <div class="portlet-title">
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
                                                <h3 class="form-section">Basic Info</h3>
                                                <div class="row">
                                                     <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Invoice No</label>
                                                                    <div class="col-md-9">
                                                                        {!! Form::text('inv_no',null,['class'=>'form-control','placeholder'=>'']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">PO No</label>
                                                                <div class="col-md-9">
                                                                     {!! Form::text('po_no',null,['class'=>'form-control','placeholder'=>'']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!--/span-->                                                    
                                                </div>
                                               <!-- <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">In Date</label>
                                                        <div class="col-md-9">
                                                            <input type="date" class="form-control" id="fromDate" name="fromDate"
                                                           value="{{ (Request::has('fromDate')) ? Request::get('fromDate') : '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                                                               
                                        </div>
                                                
                                               
                                            </div>-->
                                                <h3 class="form-section">Detail</h3>
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
                                                                <button type="submit" onclick="myFunction()" class="btn green">Submit</button>
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
        <!-- END PAGE CONTENT INNER -->
    </div>
</div>