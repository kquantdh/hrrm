<div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE BREADCRUMBS -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">@yield('level1')</a>

            </li>

        </ul>
        <!-- END PAGE BREADCRUMBS -->
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="page-content-inner">
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
                                                <h3 class="form-section">Barcode Info</h3>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Print Date</label>
                                                            <div class="col-md-9">
                                                                {!! Form::date('print_date',null,['class'=>'form-control','placeholder'=>'']) !!}
                                                                <span class="help-block"> Typing print date. </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Stock No</label>
                                                            <div class="col-md-9">
                                                                    {!! Form::select('stock_no',['1'=>'1 : First floor','2'=>'2 : Second floor'],null,["class"=>"form-control"]) !!}
                                                                <span class="help-block"> Typing type of stock. </span>
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
                                                                <label class="control-label col-md-3">Belong to</label>
                                                                <div class="col-md-9">
                                                                        {!! Form::select('belong_to',['A'=>'A : FMA','V'=>'V : FMV','H'=>'H : FMV-HRR','S'=>'S : HCM','J'=>'J : FMMC'],null,["class"=>"form-control"]) !!}
                                                                    <span class="help-block"> Typing belong to. </span>
    
    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Tool Jig or Part</label>
                                                                    <div class="col-md-9">
                                                                            {!! Form::select('tjp',['T'=>'1 : Tool Jig','P'=>'2 : Part'],null,["class"=>"form-control"]) !!}
                                                                        <span class="help-block"> Typing T/J or Part. </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->    
                                                        </div>
                                                <!--/row-->
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Amount</label>
                                                            <div class="col-md-9">
                                                                {!! Form::text('amount',null,['class'=>'form-control','placeholder'=>'']) !!}
                                                                <span class="help-block"> Typing amount. </span>


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
                                                            <label class="control-label col-md-3">From Index</label>
                                                            <div class="col-md-9">
                                                                {!! Form::text('from_index',null,['class'=>'form-control','placeholder'=>'']) !!}

                                                                <span class="help-block"> Typing from index. </span>
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
        </div>
        <!-- END PAGE CONTENT INNER -->
    </div></div>