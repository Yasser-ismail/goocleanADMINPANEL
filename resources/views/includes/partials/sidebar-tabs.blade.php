<li class="nav-item">
    <a class="nav-link {{
                    Route::is('dashboard/home') ? 'active' : ''
                }}" href="{{route('dashboard.home')}}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        @lang('backend.dashboard')
    </a>
</li>

@can('viewAny', \App\Models\User::class)
    <li class="nav-item">
        <a class="nav-link
                    {{Route::is('dashboard/users') ? 'active' : ''}}"
                    href="{{route('dashboard.users.index')}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            @lang('users.actions.list')
        </a>
    </li>
@endcan


@can('viewAny',\App\Models\Company::class)
    <li class='nav-item'>
        <a class='nav-link
                    {{Route::is('dashboard/companies') ? 'active' : '' }}'
                    href='{{route('dashboard.companies.index')}}'>
            <i class='nav-icon fas fa-tachometer-alt'></i>
           @lang('companies.actions.list')
        </a>
    </li>
@endcan
@can('viewAny',\App\Models\Client::class)
    <li class='nav-item'>
        <a class='nav-link
                    {{Route::is('dashboard/clients') ? 'active' : '' }}'
                    href='{{route('dashboard.clients.index')}}'>
            <i class='nav-icon fas fa-tachometer-alt'></i>
           @lang('clients.actions.list')
        </a>
    </li>
@endcan
@can('viewAny',\App\Models\Workinghour::class)
    <li class='nav-item'>
        <a class='nav-link
                    {{Route::is('dashboard/workinghours') ? 'active' : '' }}'
                    href='{{route('dashboard.workinghours.index')}}'>
            <i class='nav-icon fas fa-tachometer-alt'></i>
           @lang('workinghours.actions.list')
        </a>
    </li>
@endcan
@can('viewAny',\App\Models\Appoientment::class)
    <li class='nav-item'>
        <a class='nav-link
                    {{Route::is('dashboard/appoientments') ? 'active' : '' }}'
           href='{{route('dashboard.appoientments.index')}}'>
            <i class='nav-icon fas fa-tachometer-alt'></i>
            @lang('appoientments.actions.list')
        </a>
    </li>
@endcan
@can('viewAny',\App\Models\Service::class)
    <li class='nav-item'>
        <a class='nav-link
                    {{Route::is('dashboard/services') ? 'active' : '' }}'
           href='{{route('dashboard.services.index')}}'>
            <i class='nav-icon fas fa-tachometer-alt'></i>
            @lang('services.actions.list')
        </a>
    </li>
@endcan
@can('viewAny',\App\Models\City::class)
    <li class='nav-item'>
        <a class='nav-link
                    {{Route::is('dashboard/cities') ? 'active' : '' }}'
                    href='{{route('dashboard.cities.index')}}'>
            <i class='nav-icon fas fa-tachometer-alt'></i>
           @lang('cities.actions.list')
        </a>
    </li>
@endcan
@can('viewAny',\App\Models\Setting::class)
    <li class='nav-item'>
        <a class='nav-link
                    {{Route::is('dashboard/settings') ? 'active' : '' }}'
                    href='{{route('dashboard.settings.index')}}'>
            <i class='nav-icon fas fa-tachometer-alt'></i>
           @lang('settings.actions.list')
        </a>
    </li>
@endcan


@can('viewAny',\App\Models\Time::class)
    <li class='nav-item'>
        <a class='nav-link
                    {{Route::is('dashboard/times') ? 'active' : '' }}'
                    href='{{route('dashboard.times.index')}}'>
            <i class='nav-icon fas fa-tachometer-alt'></i>
           @lang('times.actions.list')
        </a>
    </li>
@endcan
