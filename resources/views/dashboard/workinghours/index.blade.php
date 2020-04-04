@extends('layouts.backend')

@section('title')
    @lang('workinghours.actions.list')
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
                                        <input  type="date" name="date" required class="form-control"
                                               placeholder="@lang('workinghours.attributes.date')">
                                    </div>

                                    <div class="col-md-1">
                                        <input class="btn btn-danger" type="submit" value="بحث">
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-warning" href="{{route('dashboard.workinghours.index')}}">إخلاء</a>
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
                        @lang('workinghours.actions.list')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar"
                         aria-label="@lang('workinghours.actions.create')">
                        <a href="{{ route('dashboard.workinghours.create') }}" class="btn btn-success ml-1"
                           data-toggle="tooltip"
                           title="@lang('workinghours.actions.create')"><i class="fas fa-plus-circle"></i></a>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover" id="result-table">
                    <thead>
                    <tr>
                        <th>@lang('workinghours.attributes.company')</th>
                        <th>@lang('workinghours.attributes.city')</th>
                        <th>@lang('workinghours.attributes.date')</th>
                        <th>@lang('workinghours.attributes.start')</th>
                        <th>@lang('workinghours.attributes.end')</th>
                        <th>@lang('workinghours.attributes.no-of-interviews')</th>
                        <th>@lang('workinghours.attributes.no-of-reservations')</th>
                        <th style="width: 150px;">@lang('workinghours.actions.list')</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($workinghours as $workinghour)
                        <tr>
                            <th>{{ $workinghour->company->name }}</th>
                            <th>{{ $workinghour->city->name }}</th>
                            <th>{{ $workinghour->date}}</th>
                            <th>{{ $workinghour->start}}</th>
                            <th>{{ $workinghour->end}}</th>
                            <th>{{ $workinghour->no_of_interviews}}</th>
                            <th>{{ $workinghour->countOfReservedTimes()}}</th>
                            <th>

                                @include('dashboard.workinghours.partials.edit')
                                @include('dashboard.workinghours.partials.delete')

                            </th>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                @if(!$workinghours->count())
                    <div class="alert alert-info alert-important">
                        @lang('workinghours.empty')
                        <a href="{{ route('dashboard.workinghours.create') }}">
                            @lang('workinghours.actions.create')
                        </a>
                    </div>
                @endif
            </div>
        </div><!--card-body-->
        @if($workinghours->hasPages())
            <div class="card-footer">
                {{ $workinghours->links() }}
            </div>
        @endif
    </div><!--card-->

@endsection
