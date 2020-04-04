@can('view', $appoientment)
    <a href="{{ route('dashboard.appoientments.show', $appoientment) }}" class="btn btn-success btn-sm">
        <i class="fas fa-eye"></i>
    </a>
@endcan
