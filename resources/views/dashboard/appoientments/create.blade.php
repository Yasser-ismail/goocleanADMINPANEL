@extends('layouts.backend')

@section('title')
    @lang('appoientments.actions.list') | @lang('appoientments.actions.create')
@endsection

@section('content')

    {{ html()->form('POST', route('dashboard.appoientments.store'))->class('form-horizontal')->acceptsFiles()->open() }}
    <div class="card my-4">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('appoientments.actions.list')
                        <small class="text-muted">@lang('appoientments.actions.create')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
        </div>
        <div class="card-body">
            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(trans('appoientments.attributes.client_id'))->class('col-md-2 form-control-label')->for('client_id') }}

                        <div class="col-md-10">
                            <select name="client_id" id="client" class="form-control">
                                <option selected disabled>{{trans('clients.html.choose-phone')}}</option>
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->phone}}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(trans('appoientments.attributes.city_id'))->class('col-md-2 form-control-label')->for('city_id') }}
                        <div class="col-md-10">
                            <input id="city" class="form-control" type="hidden"  name="city_id">
                            <input id="city_name" class="form-control" type="text" placeholder="{{trans('cities.html.no-city')}}" disabled value="">
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(trans('appoientments.attributes.company_id'))->class('col-md-2 form-control-label')->for('company_id') }}
                        <div class="col-md-10">
                            <select name="company_id" id="company" class="form-control" style="width: 100%">
                                <option disabled selected>{{trans('companies.html.no-companies')}}</option>
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(trans('appoientments.attributes.workinghour_id'))->class('col-md-2 form-control-label')->for('workinghour_id') }}
                        <div class="col-md-10">
                            <select name="workinghour_id" id="workinghour" class="form-control" style="width: 100%">
                                <option disabled selected>{{trans('workinghours.html.no-dates')}}</option>
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(trans('appoientments.attributes.time_id'))->class('col-md-2 form-control-label')->for('time_id') }}
                        <div class="col-md-10">
                            <select name="time_id" id="time" class="form-control" style="width: 100%">
                                <option disabled selected>{{trans('times.html.no-time')}}</option>
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(trans('appoientments.attributes.address'))->class('col-md-2 form-control-label')->for('address') }}
                        <div class="col-md-10">
                            {{html()->textarea('address')
                                    ->class('form-control')
                                    ->value(old('address'))
                            }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(trans('appoientments.attributes.service_id'))->class('col-md-2 form-control-label')->for('service_id') }}
                        <div class="col-md-10">
                            <select name="service_id[]" id="service_id" class="form-control" multiple style="width: 100%">
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->


        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('dashboard.appoientments.index'), trans('appoientments.actions.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(trans('appoientments.actions.save')) }}
                </div><!--col-->
            </div><!--row-->
        </div>
    </div>
    {{ html()->form()->close() }}

@endsection

@push('after-scripts')
    <script>
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#client').change(function () {
                if ($(this).val() != '') {
                    $('#service_id').empty().html();
                    $('#workinghour').empty().html('<option selected disabled>' + '{{trans('workinghours.html.no-dates')}}' + '</option>');
                    $('#time').empty().html('<option selected disabled>' + '{{trans('times.html.no-time')}}' + '</option>');
                    var id = $(this).val();

                    $.ajax({
                        url: "{{route('dashboard.clients.index')}}" + '/' + id + '/city',
                        type: 'get',
                        success: function (data) {
                            $("#city").val(data.id);
                            $("#city_name").val(data.name);
                        }

                    });

                    $.ajax({
                        url: "{{route('dashboard.clients.index')}}" + '/' + id + '/companies',
                        type: 'get',
                        success: function (data) {
                            $("#company").empty().html(data);
                        }

                    });
                }
            });

            $('#company').change(function () {
                if ($(this).val() != '') {
                    $('#service_id').empty().html();
                    $('#workinghour').empty().html('<option selected disabled>' + '{{trans('workinghours.html.no-dates')}}' + '</option>');
                    $('#time').empty().html('<option selected disabled>' + '{{trans('times.html.no-time')}}' + '</option>');
                    var id = $(this).val();
                    var c_id = $('#city').val();

                    $.ajax({
                        url: "{{route('dashboard.companies.index')}}" + '/' + id + '/dates/' + c_id + '/city',
                        type: 'get',
                        success: function (data) {
                            $("#workinghour").empty().html(data);
                        }
                    });

                    $.ajax({
                        url: "{{route('dashboard.companies.index')}}" + '/' + id + '/services',
                        type: 'get',
                        success: function (data) {
                            $("#service_id").empty().html(data);
                        }
                    });
                }
            });

            $('#workinghour').change(function () {
                if ($(this).val() != '') {
                    var id = $(this).val();

                    $.ajax({
                        url: "{{route('dashboard.workinghours.index')}}" + '/' + id + '/times',
                        type: 'get',
                        success: function (data) {
                            $("#time").empty().html(data);
                        }
                    });
                }
            });

        });

    </script>
@endpush

