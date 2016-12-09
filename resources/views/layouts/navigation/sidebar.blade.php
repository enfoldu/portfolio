<div class="panel panel-default">

    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation" @if ($route == 'dashboard') class="active" @endif><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li role="presentation" class="{{ Request::is('users*') ? 'active' : '' }}"><a href="{{ route('users') }}">Users</a></li>
            <li role="presentation" class="{{ Request::is('roles*') ? 'active' : '' }}"><a href="{{ route('roles') }}">Roles</a></li>
            {{--<li role="presentation" @if ($route == 'settings') class="active" @endif><a href="{{ route('settings') }}">Settings</a></li>--}}
        </ul>
    </div>
</div>