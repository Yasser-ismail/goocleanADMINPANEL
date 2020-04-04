@can('update', $user)
    <a href="{{ route('dashboard.users.edit', $user) }}" class="btn btn-primary btn-sm">
        <i class="fas fa-edit"></i>
    </a>
@endcan
