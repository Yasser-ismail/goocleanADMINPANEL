@can('delete', $client)
    <a href='{{route('dashboard.clients.destroy',$client->id)}}'
       data-method='delete'
       data-trans-button-cancel=" @lang('clients.dialogs.delete.cancel') "
       data-trans-button-confirm=" @lang('clients.dialogs.delete.confirm') "
       data-trans-title=" @lang('clients.dialogs.delete.info') "
       class='btn btn-danger btn-sm'>

        <i class='fas fa-trash' data-toggle='tooltip'
           data-placement='top'
           title=" @lang('clients.dialogs.delete.title') "></i>

    </a>
@endcan





