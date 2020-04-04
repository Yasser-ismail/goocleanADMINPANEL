@can('delete', $user)
    <a href='{{route('dashboard.users.destroy',$user->id)}}'
       data-method='delete'
       data-trans-button-cancel=" @lang('users.dialogs.delete.cancel') "
       data-trans-button-confirm=" @lang('users.dialogs.delete.confirm') "
       data-trans-title=" @lang('users.dialogs.delete.info') "
       class='btn btn-danger btn-sm'>

        <i class='fas fa-trash' data-toggle='tooltip'
           data-placement='top'
           title=" @lang('users.dialogs.delete.title') "></i>

    </a>
@endcan





