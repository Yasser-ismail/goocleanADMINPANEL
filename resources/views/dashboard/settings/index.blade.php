@extends('layouts.backend')

@section('title')
    @lang('settings.actions.list')
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('settings.actions.list')
                    </h4>
                </div><!--col-->

        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover" id="result-table">
                    <thead>
                    <tr>
                        <th>@lang('settings.attributes.aboutus_title')</th>
                        <th>@lang('settings.attributes.aboutus_des')</th>
                        <th>@lang('settings.attributes.aboutus_content')</th>
                        <th style="width: 150px;">@lang('settings.actions.list')</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($settings as $setting)
                        <tr>
                            <th>{{ str_limit($setting->aboutus_title, 20) }}</th>
                            <th>{{ str_limit($setting->aboutus_des, 20) }}</th>
                            <th>{{ str_limit($setting->aboutus_content, 20) }}</th>
                            <th>
                                @include('dashboard.settings.partials.edit')
                            </th>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                @if(!$settings->count())
                    <div class="alert alert-info alert-important">
                        @lang('settings.empty')
                        <a href="{{ route('dashboard.settings.create') }}">
                            @lang('settings.actions.create')
                        </a>
                    </div>
                @endif
            </div>
        </div><!--card-body-->
        @if($settings->hasPages())
            <div class="card-footer">
                {{ $settings->links() }}
            </div>
        @endif
    </div><!--card-->

@endsection
