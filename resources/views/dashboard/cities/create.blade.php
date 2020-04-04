@extends('layouts.backend')

@section('title')
    @lang('cities.actions.list') | @lang('cities.actions.create')
@endsection

@section('content')

    {{ html()->form('POST', route('dashboard.cities.store'))->class('form-horizontal')->acceptsFiles()->open() }}
        <div class="card my-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('cities.actions.list')
                            <small class="text-muted">@lang('cities.actions.create')</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->
            </div>
            <div class="card-body">
                <div class="row mt-4 mb-4">
                    <div class="col">

                        <div class="form-group row">
                            {{ html()->label(trans('cities.attributes.name'))->class('col-md-2 form-control-label')->for('name') }}

                            <div class="col-md-10">
                                {{ html()->text('name')
                                    ->class('form-control')
                                    ->placeholder(trans('cities.attributes.name'))
                                    ->attribute('maxlength', 191)
                                    ->value(old('name'))
                                    ->required()
                                    }}
                            </div><!--col-->
                        </div><!--form-group-->

                    </div><!--col-->
                </div><!--row-->
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('dashboard.cities.index'), trans('cities.actions.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(trans('cities.actions.save')) }}
                    </div><!--col-->
                </div><!--row-->
           </div>
        </div>
    {{ html()->form()->close() }}

@endsection
