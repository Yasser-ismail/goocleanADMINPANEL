@extends('layouts.backend')

@section('title')
    @lang('settings.actions.list') | @lang('settings.actions.edit')
@endsection

@section('content')

    {{ html()->form('POST', route('dashboard.settings.update',$setting))->class('form-horizontal')->acceptsFiles()->open() }}

    @method('PUT')

    <div class="card my-4">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('settings.actions.list')
                        <small class="text-muted">@lang('settings.actions.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
        </div>
        <div class="card-body">

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('settings.attributes.aboutus_title'))->class('col-md-2 form-control-label')->for('aboutus_title') }}

                        <div class="col-md-10">
                            {{ html()->text('aboutus_title')
                                ->class('form-control')
                                ->attribute('maxlength', 191)
                                ->value($setting->aboutus_title)
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('settings.attributes.aboutus_des'))->class('col-md-2 form-control-label')->for('aboutus_des') }}

                        <div class="col-md-10">
                            {{ html()->textarea('aboutus_des')
                                ->class('form-control')
                                ->value($setting->aboutus_des)
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('settings.attributes.aboutus_content'))->class('col-md-2 form-control-label')->for('aboutus_content') }}

                        <div class="col-md-10">
                            {{ html()->textarea('aboutus_content')
                                ->class('form-control')
                                ->value($setting->aboutus_content)
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('dashboard.settings.index'), trans('settings.actions.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(trans('settings.actions.save')) }}
                </div><!--col-->
            </div><!--row-->
        </div>
    </div>
    {{ html()->form()->close() }}

@endsection
