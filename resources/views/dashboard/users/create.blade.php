@extends('layouts.backend')

@section('title')
    @lang('users.actions.list') | @lang('users.actions.create')
@endsection

@section('content')

    {{ html()->form('POST', route('dashboard.users.store'))->class('form-horizontal')->acceptsFiles()->open() }}
    <div class="card my-4">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('users.actions.list')
                        <small class="text-muted">@lang('users.actions.create')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
        </div>
        <div class="card-body">
            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('users.attributes.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(trans('users.attributes.name'))
                                ->attribute('maxlength', 191)
                                ->value(old('name'))
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(trans('users.attributes.email'))->class('col-md-2 form-control-label')->for('email') }}

                        <div class="col-md-10">
                            {{ html()->email('email')
                                ->class('form-control')
                                ->placeholder(trans('users.attributes.email'))
                                ->attribute('maxlength', 191)
                                ->value(old('email'))
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(trans('users.attributes.password'))->class('col-md-2 form-control-label')->for('password') }}

                        <div class="col-md-10">
                            {{ html()->password('password')
                                ->class('form-control')
                                ->placeholder(trans('users.attributes.password'))
                                ->attribute('maxlength', 191)
                                ->value(old('password'))
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(trans('users.attributes.phone_number'))->class('col-md-2 form-control-label')->for('phone_number') }}

                        <div class="col-md-10">
                            {{ html()->text('phone_number')
                                ->class('form-control')
                                ->placeholder(trans('users.attributes.phone_number'))
                                ->attribute('maxlength', 191)
                                ->value(old('phone_number'))
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(trans('users.attributes.is_active'))->class('col-md-2 form-control-label')->for('is_active') }}

                        <div class="col-md-10">
                            {{ html()->select('is_active',['1' => trans('users.attributes.is_active-options.active') , '0' => trans('users.attributes.is_active-options.in-active')])
                                   ->required()
                                   ->style(['width'=>'100%'])
                                   ->class('form-control') }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(trans('users.attributes.type'))->class('col-md-2 form-control-label')->for('type') }}

                        <div class="col-md-10">
                            {{ html()->select('type',[
                        'admin' => trans('users.attributes.type-options.admin') ,
                        'supervisor' => trans('users.attributes.type-options.supervisor') ,
                         ])
                                   ->required()
                                   ->style(['width'=>'100%'])
                                   ->class('form-control') }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('dashboard.users.index'), trans('users.actions.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(trans('users.actions.save')) }}
                </div><!--col-->
            </div><!--row-->
        </div>
    </div>
    {{ html()->form()->close() }}

@endsection
