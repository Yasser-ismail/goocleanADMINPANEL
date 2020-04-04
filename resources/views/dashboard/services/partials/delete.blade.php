@can('delete', $service)
    <a href='{{route('dashboard.services.destroy',$service->id)}}'
       data-method='delete'
       data-trans-button-cancel=" @lang('services.dialogs.delete.cancel') "
       data-trans-button-confirm=" @lang('services.dialogs.delete.confirm') "
       data-trans-title=" @lang('services.dialogs.delete.info') "
       class='btn btn-danger btn-sm'>

        <i class='fas fa-trash' data-toggle='tooltip'
           data-placement='top'
           title=" @lang('services.dialogs.delete.title') "></i>

    </a>
@endcan





