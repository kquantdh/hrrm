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
                            <h3 class="form-section">Edit Information</h3>
                            <!--/span-->
                            <div class="row">

                                    <div class="form-group">
                                        <label class="control-label col-md-3">ID</label>
                                        <div class="col-md-9">
                                            {!! Form::text('id',null,['class'=>'form-control','disabled'=>'disabled']) !!}

                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Name</label>
                                        <div class="col-md-9">
                                            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'']) !!}
                                            {!! $errors->first('name','<span style="color:red">:message</span>') !!}
                                        </div>
                                    </div>

                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Access Permission</label>
                                    <div class="col-md-9">
                                        <select name="group_id"  class="form-control">
                                            @foreach($users->get_statuses() as $key=>$status)
                                                @if($users->group_id == $key)
                                                    <option value="{{$key}}" selected>
                                                        {!!$status!!}
                                                    </option>
                                                @else
                                                    <option value="{{$key}}">
                                                        {{$status}}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                            </div>

                            </div>
                            <!--/span-->





                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" onclick="myFunction()" class="btn green" onclick="return confirm('Are you sure to change access permission ?')";>Submit
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