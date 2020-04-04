@can('delete', $company)
    <a href='{{route('dashboard.companies.destroy',$company->id)}}'
       data-method='delete'
       data-trans-button-cancel=" @lang('companies.dialogs.delete.cancel') "
       data-trans-button-confirm=" @lang('companies.dialogs.delete.confirm') "
       data-trans-title=" @lang('companies.dialogs.delete.info') "
       class='btn btn-danger btn-sm'>

        <i class='fas fa-trash' data-toggle='tooltip'
           data-placement='top'
           title=" @lang('companies.dialogs.delete.title') "></i>

    </a>
@endcan





