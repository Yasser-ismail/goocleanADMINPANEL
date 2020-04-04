@extends('layouts.backend')

@section('title')
    @lang('services.actions.list') | @lang('services.actions.edit')
@endsection

@section('content')

    {{ html()->form('POST', route('dashboard.services.update',$service))->class('form-horizontal')->acceptsFiles()->open() }}

    @method('PUT')

    <div class="card my-4">
        <div class="card-body">
            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('services.attributes.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(trans('services.attributes.name'))
                                ->attribute('maxlength', 191)
                                ->value($service->name)
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('services.attributes.price'))->class('col-md-2 form-control-label')->for('price') }}

                        <div class="col-md-10">
                            {{ html()->text('price')
                                ->class('form-control')
                                ->placeholder(trans('services.attributes.price'))
                                ->attribute('maxlength', 191)
                                ->value($service->price)
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('services.attributes.image'))->class('col-md-2 form-control-label')->for('image') }}

                        <div class="col-md-10">
                            {{ html()->file('image')
                                ->class('form-control')
                                ->attribute('maxlength', 191)
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('dashboard.services.index'), trans('services.actions.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(trans('services.actions.save')) }}
                </div><!--col-->
            </div><!--row-->
        </div>
    </div>
    {{ html()->form()->close() }}

@endsection
