@can('view', $company)
    <a href="{{ route('dashboard.companies.show', $company) }}" class="btn btn-success btn-sm">
        <i class="fas fa-eye"></i>
    </a>
@endcan
