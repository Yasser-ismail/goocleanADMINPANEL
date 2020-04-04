@extends('layouts.backend')

@section('title')
    @lang('cities.actions.list')
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
                                               placeholder="@lang('cities.attributes.name')">
                                    </div>

                                    <div class="col-md-1">
                                        <input class="btn btn-danger" type="submit" value="بحث">
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-warning" href="{{route('dashboard.cities.index')}}">إخلاء</a>
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
                        @lang('cities.actions.list')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar"
                         aria-label="@lang('cities.actions.create')">
                        <a href="{{ route('dashboard.cities.create') }}" class="btn btn-success ml-1"
                           data-toggle="tooltip"
                           title="@lang('cities.actions.create')"><i class="fas fa-plus-circle"></i></a>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover" id="result-table">
                    <thead>
                    <tr>
                        <th>@lang('cities.attributes.name')</th>
                        <th>@lang('cities.attributes.clients')</th>
                        <th>@lang('cities.attributes.appoientments')</th>
                        <th>@lang('cities.attributes.price')</th>
                        <th style="width: 150px;">@lang('cities.actions.list')</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($cities as $city)
                        <tr>
                            <th>{{ $city->name }}</th>
                            <th>{{ $city->clients()->count() }}</th>
                            <th>{{ $city->appoientments()->count() }}</th>
                            <th>{{ $city->income()}}</th>
                            <th>

                                @include('dashboard.cities.partials.edit')
                                @include('dashboard.cities.partials.delete')

                            </th>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                @if(!$cities->count())
                    <div class="alert alert-info alert-important">
                        @lang('cities.empty')
                        <a href="{{ route('dashboard.cities.create') }}">
                            @lang('cities.actions.create')
                        </a>
                    </div>
                @endif
            </div>
        </div><!--card-body-->
        @if($cities->hasPages())
            <div class="card-footer">
                {{ $cities->links() }}
            </div>
        @endif
    </div><!--card-->

@endsection
