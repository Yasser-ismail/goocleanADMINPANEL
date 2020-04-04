@extends('layouts.backend')

@section('title')
    @lang('companies.actions.list') | @lang('companies.actions.edit')
@endsection

@section('content')

    {{ html()->form('POST', route('dashboard.companies.update',$company))->class('form-horizontal')->acceptsFiles()->open() }}

    @method('PUT')

    <div class="card my-4">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('companies.actions.list')
                        <small class="text-muted">@lang('companies.actions.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
        </div>
        <div class="card-body">

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('companies.attributes.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(trans('companies.attributes.name'))
                                ->attribute('maxlength', 191)
                                ->value($company->name)
                                ->autofocus()
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('companies.attributes.email'))->class('col-md-2 form-control-label')->for('email') }}

                        <div class="col-md-10">
                            {{ html()->email('email')
                                ->class('form-control')
                                ->placeholder(trans('companies.attributes.email'))
                                ->attribute('maxlength', 191)
                                ->value($company->email)
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('companies.attributes.phone'))->class('col-md-2 form-control-label')->for('phone') }}

                        <div class="col-md-10">
                            {{ html()->number('phone')
                                ->class('form-control')
                                ->placeholder(trans('companies.attributes.phone'))
                                ->attribute('maxlength', 191)
                                ->value($company->phone)
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('companies.attributes.city_id'))->class('col-md-2 form-control-label')->for('city_id[]') }}

                        <div class="col-md-10">
                            <select name="city_id[]" class="form-control" style="width: 100%" multiple required>
                                <optgroup label="@lang('companies.attributes.option_city')">
                                    @foreach($cities as $city)
                                        <option
                                            @foreach($company->cities as $company_city)
                                            {{$company_city->id == $city->id ? 'selected' : ''}}
                                            @endforeach
                                            value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('companies.attributes.service_id'))->class('col-md-2 form-control-label')->for('service_id[]') }}

                        <div class="col-md-10">
                            <select name="service_id[]" class="form-control" style="width: 100%" multiple required>
                                <optgroup label="@lang('companies.attributes.option_service')">
                                    @foreach($services as $service)
                                        <option
                                            @foreach($company->services as $company_service)
                                            {{$company_service->id == $service->id ? 'selected' : ''}}
                                            @endforeach
                                            value="{{$service->id}}">{{$service->name}}</option>

                                    @endforeach
                                </optgroup>
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('dashboard.companies.index'), trans('companies.actions.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(trans('companies.actions.save')) }}
                </div><!--col-->
            </div><!--row-->
        </div>
    </div>
    {{ html()->form()->close() }}

@endsection
