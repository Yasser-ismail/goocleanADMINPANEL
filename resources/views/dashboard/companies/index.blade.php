@extends('layouts.backend')

@section('title')
    @lang('companies.actions.list')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                        <div class="col">
                            <form action="">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <input type="text" name="name" required class="form-control"
                                               placeholder="@lang('companies.attributes.name')">
                                    </div>

                                    <div class="col-md-1">
                                        <input class="btn btn-danger" type="submit" value="بحث">
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-warning"
                                           href="{{route('dashboard.companies.index')}}">إخلاء</a>
                                    </div>
                                </div>
                            </form>

                        </div><!--tab-->
                    </div><!--tab-content-->
                </div><!--row-->
            </div><!--card-body-->
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('companies.actions.list')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar"
                         aria-label="@lang('companies.actions.create')">
                        <a href="{{ route('dashboard.companies.create') }}" class="btn btn-success ml-1"
                           data-toggle="tooltip"
                           title="@lang('companies.actions.create')"><i class="fas fa-plus-circle"></i></a>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover" id="result-table">
                    <thead>
                    <tr>
                        <th>@lang('companies.attributes.name')</th>
                        <th>@lang('companies.attributes.email')</th>
                        <th>@lang('companies.attributes.phone')</th>
                        <th>@lang('companies.attributes.city_id')</th>
                        <th>@lang('companies.attributes.service_id')</th>
                        <th style="width: 150px;">@lang('companies.actions.list')</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($companies as $company)
                        <tr>
                            <th>{{ $company->name }}</th>
                            <th>{{ $company->email }}</th>
                            <th>{{ $company->phone }}</th>
                            <th>
                                @foreach($company->cities as $city)
                                    {{ $city->name }}
                                    @if(!$loop->last)
                                        /
                                    @endif
                                @endforeach
                            </th>
                            <th>
                                @foreach($company->services as $service)
                                    {{ $service->name }}
                                    @if(!$loop->last)
                                        /
                                    @endif
                                @endforeach
                            </th>
                            <th>
                                @include('dashboard.companies.partials.edit')
                                @include('dashboard.companies.partials.delete')
                            </th>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                @if(!$companies->count())
                    <div class="alert alert-info alert-important">
                        @lang('companies.empty')
                        <a href="{{ route('dashboard.companies.create') }}">
                            @lang('companies.actions.create')
                        </a>
                    </div>
                @endif
            </div>
        </div><!--card-body-->
        @if($companies->hasPages())
            <div class="card-footer">
                {{ $companies->links() }}
            </div>
        @endif
    </div><!--card-->

@endsection
