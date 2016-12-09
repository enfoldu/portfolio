@extends('layouts.app')

@push('styles')
<style>
    .help-block {
        display: none;
        color: red;
        font-weight: bold;
    }
</style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">Roles [{{ $roles->total() }}]</div>

                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Shorthand</th>
                                <th class="hidden-xs hidden-sm">Description</th>
                                <th class="hidden-xs hidden-sm">Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $key => $role)
                                <tr data-toggle="modal" data-target="#modal" data-content="{{ $role->content }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $role->full_name }}</td>
                                    <td>{{ $role->short_name }}</td>
                                    <td class="hidden-xs hidden-sm">{{ $role->description }}</td>
                                    <td class="hidden-xs hidden-sm">{{ date('F d, Y', strtotime($role->created_at)) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    {{ $roles->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('roles._modal')
@endsection

@push('scripts')
@include('roles._scripts')
@endpush
