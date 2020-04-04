@can('delete', $workinghour)
    <a href='{{route('dashboard.workinghours.destroy',$workinghour->id)}}'
       data-method='delete'
       data-trans-button-cancel=" @lang('workinghours.dialogs.delete.cancel') "
       data-trans-button-confirm=" @lang('workinghours.dialogs.delete.confirm') "
       data-trans-title=" @lang('workinghours.dialogs.delete.info') "
       class='btn btn-danger btn-sm'>

        <i class='fas fa-trash' data-toggle='tooltip'
           data-placement='top'
           title=" @lang('workinghours.dialogs.delete.title') "></i>

    </a>
@endcan





