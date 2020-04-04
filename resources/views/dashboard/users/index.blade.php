@extends('layouts.backend')

@section('title')
    @lang('users.actions.list')
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
                                               placeholder="@lang('users.attributes.name')">
                                    </div>

                                    <div class="col-md-1">
                                        <input class="btn btn-danger" type="submit" value="بحث">
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-warning" href="{{route('dashboard.users.index')}}">إخلاء</a>
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
                        @lang('users.actions.list')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar"
                         aria-label="@lang('users.actions.create')">
                        <a href="{{ route('dashboard.users.create') }}" class="btn btn-success ml-1"
                           data-toggle="tooltip"
                           title="@lang('users.actions.create')"><i class="fas fa-plus-circle"></i></a>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover" id="result-table">
                    <thead>
                    <tr>
                        <th>@lang('users.attributes.name')</th>
                        <th>@lang('users.attributes.email')</th>
                        <th>@lang('users.attributes.phone_number')</th>
                        <th>@lang('users.attributes.type')</th>
                        <th>@lang('users.attributes.is_active')</th>
                        <th style="width: 150px;">@lang('users.actions.list')</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->email }}</th>
                            <th>{{ $user->phone_number }}</th>
                            <th>{{ $user->type }}</th>
                            <th>
                                {{ $user->is_active == 1 ?
                                    trans('users.attributes.is_active-options.active')
                                : trans('users.attributes.is_active-options.in-active') }}
                            </th>
                            <th>

                                @include('dashboard.users.partials.show')
                                @include('dashboard.users.partials.edit')
                                @include('dashboard.users.partials.delete')

                            </th>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                @if(!$users->count())
                    <div class="alert alert-info alert-important">
                        @lang('users.empty')
                        <a href="{{ route('dashboard.users.create') }}">
                            @lang('users.actions.create')
                        </a>
                    </div>
                @endif
            </div>
        </div><!--card-body-->
        @if($users->hasPages())
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @endif
    </div><!--card-->

@endsection
