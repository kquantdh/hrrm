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
                                                                    <label class="control-label col-md-3">Customer</label>
                                                                    <div class="col-md-9">
                                                                        {!! Form::select('customer_id',$customers,null,["class"=>"form-control"]) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Quotation</label>
                                                                <div class="col-md-9">
                                                                     {!! Form::text('quotation',null,['class'=>'form-control','placeholder'=>'']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!--/span-->                                                    
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">PO </label>
                                                                    <div class="col-md-9">
                                                                        {!! Form::text('po',null,['class'=>'form-control','placeholder'=>'']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                       <!--/span-->
                                                       <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">SR No.</label>
                                                                <div class="col-md-9">
                                                                    {!! Form::text('sr_no',null,['class'=>'form-control','placeholder'=>'']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                       <!--/span-->                                                    
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                        <div class="col-md-6">
                                                                   <div class="form-group">
                                                                       <label class="control-label col-md-3">Invoice</label>
                                                                       <div class="col-md-9">
                                                                            {!! Form::text('invoice',null,['class'=>'form-control','placeholder'=>'']) !!}
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                       <!--/span-->
                                                       <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Machine</label>
                                                                <div class="col-md-9">
                                                                    {!! Form::select('head_type_id',$head_types,null,["class"=>"form-control"]) !!}
                                                                    </div>
                                                            </div>
                                                        </div>
                                                       <!--/span-->                                                    
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Serial</label>
                                                                    <div class="col-md-9">
                                                                        {!!Form::text('head_serial',null,['class'=>'form-control','placeholder'=>'']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Type SR</label>
                                                                <div class="col-md-9">
                                                                    {!! Form::select('nature_service',['Package'=>'Package','FOC'=>'FOC','Warranty'=>'Warranty'],null,["class"=>"form-control"]) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Status</label>
                                                            <div class="col-md-9">
                                                                {!! Form::select('status',['Stock Recieve'=>'Stock Recieve','Start Inspection'=>'Start Inspection',
                                                                'Inspection Done'=>'Inspection Done','Sent Quotation'=>'Sent Quotation','Got PO'=>'Got PO','Got Part'=>'Got Part',
                                                                'Repair Done'=>'Repair Done','Delivery'=>'Delivery'],null,['class'=>'form-control'])!!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--/span-->
                                                </div>
                                                <h3 class="form-section">Detail</h3>
                                                <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Problem</label>
                                                                <div class="col-md-9">
                                                                    {!! Form::textarea('problem', null, ['class' => 'form-control ckeditor', 'data-required' => '1']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/row-->
                                                        <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Countermeasure</label>
                                                                    <div class="col-md-9">
                                                                        {!! Form::textarea('countermeasure', null, ['class' => 'form-control ckeditor', 'data-required' => '1']) !!}
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