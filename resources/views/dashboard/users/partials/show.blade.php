@can('view', $user)
    <a href="{{ route('dashboard.users.show', $user) }}" class="btn btn-success btn-sm">
        <i class="fas fa-eye"></i>
    </a>
@endcan
