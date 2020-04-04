@can('view', $service)
    <a href="{{ route('dashboard.services.show', $service) }}" class="btn btn-success btn-sm">
        <i class="fas fa-eye"></i>
    </a>
@endcan
