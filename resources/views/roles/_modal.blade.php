<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#overview" aria-controls="home" role="tab" data-toggle="tab">Overview</a>
                    </li>
                    <li role="presentation">
                        <a href="#edit" aria-controls="profile" role="tab" data-toggle="tab">Edit</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="overview">

                        <br>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="well">
                                    <strong>Created: </strong> <span id="created_at"></span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="well">
                                    <strong>Updated: </strong> <span id="updated_at"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="edit">

                        <br>
                        <form class="form-horizontal" role="form" action="{{ route('roles') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="full_name" class="col-md-4 control-label">Full Name</label>

                                <div class="col-md-6">
                                    <input id="full_name" type="text" class="form-control"
                                           name="full_name"
                                           value="{{ old('full_name') }}" maxlength="255" autofocus>

                                    <span id="full_name" class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="short_name" class="col-md-4 control-label">Short Name</label>

                                <div class="col-md-6">
                                    <input id="short_name" type="text" class="form-control" name="short_name"
                                           value="{{ old('short_name') }}" maxlength="10">

                                    <span id="short_name" class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                            <textarea id="description" type="text" class="form-control" rows="4"
                                                      cols="50" name="description"
                                                      value="{{ old('description') }}" maxlength="255">
                                            </textarea>

                                    <span id="description" class="help-block"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="dropdown pull-left">
                    <button type="button" class="btn btn-danger" data-method="DELETE">Delete</button>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-method="PATCH">Update</button>
            </div>
        </div>
    </div>
</div>