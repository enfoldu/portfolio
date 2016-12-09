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
                                    <strong>Account #: </strong> <span id="id"></span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="well">
                                    <strong>Role: </strong> <span id="role"></span>
                                </div>
                            </div>
                        </div>

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
                        <form id="editForm" class="form-horizontal" role="form" action="{{ route('users') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="first_name" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name"
                                           value="{{ old('first_name') }}" maxlength="255" autofocus>

                                    <span id="first_name" class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="last_name" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name"
                                           value="{{ old('last_name') }}" maxlength="255">

                                    <span id="last_name" class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" maxlength="255">

                                    <span id="email" class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role" class="col-md-4 control-label">Roles</label>

                                <div class="col-md-6">
                                    <select id="roles" class="form-control role-selector" multiple="multiple"
                                            style="width: 100% !important;">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->short_name }}">{{ $role->full_name }}</option>
                                        @endforeach
                                    </select>
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