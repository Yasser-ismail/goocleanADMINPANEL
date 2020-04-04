@can('delete', $city)
    <a href='{{route('dashboard.cities.destroy',$city->id)}}'
       data-method='delete'
       data-trans-button-cancel=" @lang('cities.dialogs.delete.cancel') "
       data-trans-button-confirm=" @lang('cities.dialogs.delete.confirm') "
       data-trans-title=" @lang('cities.dialogs.delete.info') "
       class='btn btn-danger btn-sm'>

        <i class='fas fa-trash' data-toggle='tooltip'
           data-placement='top'
           title=" @lang('cities.dialogs.delete.title') "></i>

    </a>
@endcan





