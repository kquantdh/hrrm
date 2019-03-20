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
                            <h3 class="form-section">Basic Info for: {{$part_price_lists->id}}</h3>
                            <!--/span-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Part Name</label>
                                        <div class="col-md-9">
                                            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'']) !!}
                                            {!! $errors->first('name','<span style="color:red">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Detail</label>
                                        <div class="col-md-9">
                                            {!! Form::text('detail',null,['class'=>'form-control','placeholder'=>'']) !!}
                                            {!! $errors->first('detail','<span style="color:red">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!--/span-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Machine</label>
                                        <div class="col-md-9">
                                            {!! Form::text('machine',null,['class'=>'form-control','placeholder'=>'']) !!}
                                            {!! $errors->first('machine','<span style="color:red">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Price</label>
                                        <div class="col-md-9">
                                            {!! Form::text('price',null,['class'=>'form-control','placeholder'=>'']) !!}
                                            {!! $errors->first('price','<span style="color:red">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">VN name</label>
                                        <div class="col-md-9">
                                            {!! Form::text('vn_name',null,['class'=>'form-control','placeholder'=>'']) !!}
                                            {!! $errors->first('vn_name','<span style="color:red">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Material</label>
                                        <div class="col-md-9">
                                            {!! Form::text('material',null,['class'=>'form-control','placeholder'=>'']) !!}
                                            {!! $errors->first('material','<span style="color:red">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->

                            <h3 class="form-section">Note</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Description</label>
                                        <div class="col-md-9">
                                            {!! Form::textarea('description', null, ['class' => 'form-control ckeditor', 'data-required' => '1']) !!}
                                            {!! $errors->first('description','<span style="color:red">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Rep new</label>
                                    <div class="col-md-9">
                                        {!! Form::textarea('rep_new', null, ['class' => 'form-control ckeditor', 'data-required' => '1']) !!}
                                        {!! $errors->first('rep_new','<span style="color:red">:message</span>') !!}
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
                                            <button type="submit" onclick="myFunction()" class="btn green">Submit
                                            </button>
                                            <button type="button" class="btn default">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
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