ؤ@extends('layouts.backend')

@section('title')
    @lang('clients.actions.list') | @lang('clients.actions.edit')
@endsection

@section('content')

    {{ html()->form('POST', route('dashboard.clients.update',$client))->class('form-horizontal')->acceptsFiles()->open() }}

    @method('PUT')

    <div class="card my-4">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('clients.actions.list')
                        <small class="text-muted">@lang('clients.actions.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
        </div>
        <div class="card-body">
            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('clients.attributes.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(trans('clients.attributes.name'))
                                ->attribute('maxlength', 191)
                                ->value($client->name)
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
                        {{ html()->label(trans('clients.attributes.email'))->class('col-md-2 form-control-label')->for('email') }}

                        <div class="col-md-10">
                            {{ html()->email('email')
                                ->class('form-control')
                                ->placeholder(trans('clients.attributes.email'))
                                ->attribute('maxlength', 191)
                                ->value($client->email)
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('clients.attributes.phone'))->class('col-md-2 form-control-label')->for('phone') }}

                        <div class="col-md-10">
                            {{ html()->number('phone')
                                ->class('form-control')
                                ->placeholder(trans('clients.attributes.phone'))
                                ->attribute('maxlength', 191)
                                ->value($client->phone)
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('clients.attributes.city_id'))->class('col-md-2 form-control-label')->for('city_id') }}

                        <div class="col-md-10">
                            <select name="city_id" class="form-control" required>
                                @foreach($cities as $city)
                                    <option {{$client->city_id == $city->id ? 'selected' : ''}}value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('dashboard.clients.index'), trans('clients.actions.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(trans('clients.actions.save')) }}
                </div><!--col-->
            </div><!--row-->
        </div>
    </div>
    {{ html()->form()->close() }}

@endsection
