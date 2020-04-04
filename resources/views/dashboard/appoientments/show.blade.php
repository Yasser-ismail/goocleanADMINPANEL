@extends('layouts.backend')

@section('title')
    @lang('appoientments.actions.list') | @lang('appoientments.actions.show')
@endsection

@section('content')
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#overview" role="tab"
               aria-controls="overview" aria-expanded="true"><i
                    class="fas fa-user"></i>
                @lang('appoientments.actions.list')
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover">

                        <tr>
                            <th>@lang('appoientments.show.appoientment-serial')</th>
                            <td>{{ $appoientment->serial }}</td>
                        </tr>
                        <tr>
                            <th>@lang('appoientments.show.appoientment-day')</th>
                            <td>{{ $appoientment->workinghour->date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('appoientments.show.appoientment-time')</th>
                            <td>{{ $appoientment->time->time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('appoientments.show.client-name')</th>
                            <td>{{ $appoientment->client->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('appoientments.show.client-phone')</th>
                            <td>{{ $appoientment->client->phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('appoientments.show.client-email')</th>
                            <td>{{ $appoientment->client->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('appoientments.show.client-city')</th>
                            <td>{{ $appoientment->city->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('appoientments.show.client-address')</th>
                            <td>{{ $appoientment->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('appoientments.show.company-name')</th>
                            <td>{{ $appoientment->company->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('appoientments.show.company-phone')</th>
                            <td>{{ $appoientment->company->phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('appoientments.show.company-email')</th>
                            <td>{{ $appoientment->company->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('appoientments.show.All_services')</th>
                            <td>
                                @foreach($appoientment->services as $service)
                                    {{ $service->name.':'.'  '. $service->price }}
                                    @if(!$loop->last)
                                        /
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th><strong>@lang('appoientments.show.appoientment-totalprice')</strong></th>
                            <td><strong>{{ $appoientment->totalprice() }}</strong></td>
                        </tr>
                        <tr>
                            <th>@lang('appoientments.actions.list')</th>
                            <td>@include('dashboard.appoientments.partials.edit')
                                @include('dashboard.appoientments.partials.delete')
                                @include('dashboard.appoientments.partials.print')
                            </td>
                        </tr>

                    </table>
                </div>
            </div><!--table-responsive-->

        </div><!--tab-->
    </div><!--tab-content-->
@endsection
