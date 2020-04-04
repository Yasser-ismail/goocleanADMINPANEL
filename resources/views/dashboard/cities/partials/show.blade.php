@can('view', $city)
    <a href="{{ route('dashboard.cities.show', $city) }}" class="btn btn-success btn-sm">
        <i class="fas fa-eye"></i>
    </a>
@endcan
