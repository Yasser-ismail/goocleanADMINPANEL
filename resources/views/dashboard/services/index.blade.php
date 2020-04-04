@extends('layouts.backend')

@section('title')
    @lang('services.actions.list')
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
                                               placeholder="@lang('services.attributes.name')">
                                    </div>

                                    <div class="col-md-1">
                                        <input class="btn btn-danger" type="submit" value="بحث">
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-warning" href="{{route('dashboard.services.index')}}">إخلاء</a>
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
                        @lang('services.actions.list')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar"
                         aria-label="@lang('services.actions.create')">
                        <a href="{{ route('dashboard.services.create') }}" class="btn btn-success ml-1"
                           data-toggle="tooltip"
                           title="@lang('services.actions.create')"><i class="fas fa-plus-circle"></i></a>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover" id="result-table">
                    <thead>
                    <tr>
                        <th>@lang('services.attributes.name')</th>
                        <th>@lang('services.attributes.price')</th>
                        <th>@lang('services.attributes.image')</th>
                        <th style="width: 150px;">@lang('services.actions.list')</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($services as $service)
                        <tr>
                            <th>{{ $service->name }}</th>
                            <th>  {{ $service->price }} ريال</th>
                            <th><img src="{{$service->image }}" style="width: 80px; height: 50px"></th>
                            <th>

                                @include('dashboard.services.partials.edit')
                                @include('dashboard.services.partials.delete')

                            </th>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                @if(!$services->count())
                    <div class="alert alert-info alert-important">
                        @lang('services.empty')
                        <a href="{{ route('dashboard.services.create') }}">
                            @lang('services.actions.create')
                        </a>
                    </div>
                @endif
            </div>
        </div><!--card-body-->
        @if($services->hasPages())
            <div class="card-footer">
                {{ $services->links() }}
            </div>
        @endif
    </div><!--card-->

@endsection
