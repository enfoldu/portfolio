@extends('layouts.app')

@push('styles')
<style>
    .help-block {
        display: none;
        color: red;
        font-weight: bold;
    }
</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">Users [{{ $users->total() }}]</div>

                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="hidden-xs hidden-sm">Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $key => $user)
                                <tr data-toggle="modal" data-target="#modal" data-content="{{ $user->content }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="hidden-xs hidden-sm">{{ date('F d, Y', strtotime($user->created_at)) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('users._modal', ['roles' => $roles])
@endsection

@push('scripts')
@include('users._scripts')
@endpush
