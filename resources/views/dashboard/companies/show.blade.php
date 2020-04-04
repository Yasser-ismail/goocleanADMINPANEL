@extends('layouts.backend')

@section('title')
    @lang('companies.actions.list') | @lang('companies.actions.show')
@endsection

@section('content')
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#overview" role="tab"
               aria-controls="overview" aria-expanded="true"><i
                    class="fas fa-user"></i>
                @lang('companies.actions.list')
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover">

                        <tr>
                            <th>@lang('companies.attributes.name')</th>
                            <td>{{ $company->name }}</td>

                        </tr>
                        <tr>
                            <th>@lang('companies.actions.list')</th>
                            <td>@include('dashboard.companies.partials.edit')
                                @include('dashboard.companies.partials.delete')</td>
                        </tr>

                    </table>
                </div>
            </div><!--table-responsive-->

        </div><!--tab-->
    </div><!--tab-content-->
@endsection
