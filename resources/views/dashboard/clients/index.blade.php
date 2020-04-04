@extends('layouts.backend')

@section('title')
    @lang('clients.actions.list')
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
                                               placeholder="@lang('clients.attributes.name')">
                                    </div>

                                    <div class="col-md-1">
                                        <input class="btn btn-danger" type="submit" value="بحث">
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-warning" href="{{route('dashboard.clients.index')}}">إخلاء</a>
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
                        @lang('clients.actions.list')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar"
                         aria-label="@lang('clients.actions.create')">
                        <a href="{{ route('dashboard.clients.create') }}" class="btn btn-success ml-1"
                           data-toggle="tooltip"
                           title="@lang('clients.actions.create')"><i class="fas fa-plus-circle"></i></a>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover" id="result-table">
                    <thead>
                    <tr>
                        <th>@lang('clients.attributes.name')</th>
                        <th>@lang('clients.attributes.email')</th>
                        <th>@lang('clients.attributes.phone')</th>
                        <th>@lang('clients.attributes.city_id')</th>
                        <th>@lang('clients.attributes.appoientments')</th>
                        <th style="width: 150px;">@lang('clients.actions.list')</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($clients as $client)
                        <tr>
                            <th>{{ $client->name }}</th>
                            <th>{{$client->email}}</th>
                            <th>{{$client->phone}}</th>
                            <th>{{$client->city->name}}</th>
                            <th>{{$client->appoientments()->count()}}</th>
                            <th>

                                @include('dashboard.clients.partials.edit')
                                @include('dashboard.clients.partials.delete')

                            </th>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                @if(!$clients->count())
                    <div class="alert alert-info alert-important">
                        @lang('clients.empty')
                        <a href="{{ route('dashboard.clients.create') }}">
                            @lang('clients.actions.create')
                        </a>
                    </div>
                @endif
            </div>
        </div><!--card-body-->
        @if($clients->hasPages())
            <div class="card-footer">
                {{ $clients->links() }}
            </div>
        @endif
    </div><!--card-->

@endsection
