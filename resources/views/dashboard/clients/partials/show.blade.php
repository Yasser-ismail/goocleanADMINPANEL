@can('view', $client)
    <a href="{{ route('dashboard.clients.show', $client) }}" class="btn btn-success btn-sm">
        <i class="fas fa-eye"></i>
    </a>
@endcan
