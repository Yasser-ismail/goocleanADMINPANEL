@can('view', $setting)
    <a href="{{ route('dashboard.settings.show', $setting) }}" class="btn btn-success btn-sm">
        <i class="fas fa-eye"></i>
    </a>
@endcan
