@extends('layouts.backend')

@section('title')
    @lang('appoientments.actions.list')
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
                                        <input type="text" name="serial" required class="form-control"
                                               placeholder="@lang('appoientments.attributes.serial')">
                                    </div>

                                    <div class="col-md-1">
                                        <input class="btn btn-danger" type="submit" value="بحث">
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-warning" href="{{route('dashboard.appoientments.index')}}">إخلاء</a>
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
                        @lang('appoientments.actions.list')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar"
                         aria-label="@lang('appoientments.actions.create')">
                        <a href="{{ route('dashboard.appoientments.create') }}" class="btn btn-success ml-1"
                           data-toggle="tooltip"
                           title="@lang('appoientments.actions.create')"><i class="fas fa-plus-circle"></i></a>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover" id="result-table">
                    <thead>
                    <tr>
                        <th>@lang('appoientments.attributes.serial')</th>
                        <th>@lang('appoientments.attributes.company')</th>
                        <th>@lang('appoientments.attributes.city')</th>
                        <th>@lang('appoientments.attributes.date')</th>
                        <th>@lang('appoientments.attributes.time')</th>
                        <th style="width: 150px;">@lang('appoientments.actions.list')</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($appoientments as $appoientment)
                        <tr>
                            <th>{{ $appoientment->serial }}</th>
                            <th>{{ $appoientment->company->name }}</th>
                            <th>{{ $appoientment->city->name }}</th>
                            <th>{{ $appoientment->workinghour->date }}</th>
                            <th>{{ $appoientment->time->time }}</th>
                            <th>

                                @include('dashboard.appoientments.partials.show')
                                @include('dashboard.appoientments.partials.edit')
                                @include('dashboard.appoientments.partials.delete')

                            </th>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                @if(!$appoientments->count())
                    <div class="alert alert-info alert-important">
                        @lang('appoientments.empty')
                        <a href="{{ route('dashboard.appoientments.create') }}">
                            @lang('appoientments.actions.create')
                        </a>
                    </div>
                @endif
            </div>
        </div><!--card-body-->
        @if($appoientments->hasPages())
            <div class="card-footer">
                {{ $appoientments->links() }}
            </div>
        @endif
    </div><!--card-->

@endsection
