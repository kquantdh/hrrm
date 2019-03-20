
        <!-- BEGIN PAGE CONTENT INNER -->
                            
                                   
                                    <div class="portlet-body form">
                                        <!-- BEGIN FORM-->
                                        <form action="#" class="form-horizontal">
                                            <div class="form-body">
                                                    <div class="portlet light ">
                                                    <div class="portlet-title">
                                                            <div class="caption font-dark">
                                                                <i class="icon-settings font-dark"></i>
                                                                <span class="caption-subject bold uppercase"> Basic Info</span>
                                                            </div>
                                                        </div>
                                                
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
                                                                <label class="control-label col-md-3">Machine
                                                                        <span class="required" aria-required="true"> * </span>
                                                                </label>
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
                                                                <label class="control-label col-md-3">Type SR
                                                                        <span class="required" aria-required="true"> * </span>
                                                                </label>
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
                                                    </div> <div class="col-md-6">
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
                             
        <!-- END PAGE CONTENT INNER -->
  