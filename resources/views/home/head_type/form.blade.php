
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
                                                <h3 class="form-section">Head Info</h3>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}"></div>

                                                            <label class="control-label col-md-3">Head Type</label>
                                                            <div class="col-md-9">
                                                                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Head type']) !!}
                                                                <span class="help-block"> Typing head type. </span>
                                                                {!! $errors->first('name','<span style="color:red">:message</span>') !!}

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
                                                                <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}"></div>

                                                            <label class="control-label col-md-3">Price</label>
                                                            <div class="col-md-9">
                                                                {!! Form::text('price',null,['class'=>'form-control','placeholder'=>'Price']) !!}

                                                                <span class="help-block"> Typing Price. </span>
                                                                {!! $errors->first('price','<span style="color:red">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                    <!--/span-->
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
      