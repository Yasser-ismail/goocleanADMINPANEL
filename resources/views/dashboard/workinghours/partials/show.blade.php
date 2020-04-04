@can('view', $workinghour)
    <a href="{{ route('dashboard.workinghours.show', $workinghour) }}" class="btn btn-success btn-sm">
        <i class="fas fa-eye"></i>
    </a>
@endcan
