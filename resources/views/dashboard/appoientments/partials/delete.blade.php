@can('delete', $appoientment)
    <a href='{{route('dashboard.appoientments.destroy',$appoientment->id)}}'
       data-method='delete'
       data-trans-button-cancel=" @lang('appoientments.dialogs.delete.cancel') "
       data-trans-button-confirm=" @lang('appoientments.dialogs.delete.confirm') "
       data-trans-title=" @lang('appoientments.dialogs.delete.info') "
       class='btn btn-danger btn-sm'>

        <i class='fas fa-trash' data-toggle='tooltip'
           data-placement='top'
           title=" @lang('appoientments.dialogs.delete.title') "></i>

    </a>
@endcan





