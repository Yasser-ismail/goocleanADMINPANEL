@extends('layouts.backend')

@section('title')
    @lang('workinghours.actions.list') | @lang('workinghours.actions.create')
@endsection

@section('content')

    {{ html()->form('POST', route('dashboard.workinghours.store'))->class('form-horizontal')->acceptsFiles()->open() }}
    <div class="card my-4">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('workinghours.actions.list')
                        <small class="text-muted">@lang('workinghours.actions.create')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
        </div>
        <div class="card-body">
            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('workinghours.attributes.company'))->class('col-md-2 form-control-label')->for('company') }}

                        <div class="col-md-10">
                            <select class="form-control  company" name="company_id" style="width: 100%" data-dependent="city">
                                <option disabled selected>{{trans('companies.html.choose-company')}}</option>
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('workinghours.attributes.city'))->class('col-md-2 form-control-label')->for('city') }}

                        <div class="col-md-10">
                            <select id="city" name="city_id" class="form-control" style="width: 100%">
                                <option selected disabled>{{trans('cities.html.no-cities')}}</option>

                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('workinghours.attributes.date'))->class('col-md-2 form-control-label')->for('date') }}

                        <div class="col-md-10">
                            {{ html()->date('date')
                                ->class('form-control')
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('workinghours.attributes.start'))->class('col-md-2 form-control-label')->for('start') }}

                        <div class="col-md-10">
                            {{ html()->time('start')
                                ->class('form-control')
                                ->value(old('start'))
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('workinghours.attributes.end'))->class('col-md-2 form-control-label')->for('end') }}

                        <div class="col-md-10">
                            {{ html()->time('end')
                                ->class('form-control')
                                ->value(old('end'))
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(trans('workinghours.attributes.interval'))->class('col-md-2 form-control-label')->for('interval') }}

                        <div class="col-md-10">
                            {{ html()->number('interval')
                                ->class('form-control')
                                ->value(old('interval'))
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
                    {{ form_cancel(route('dashboard.workinghours.index'), trans('workinghours.actions.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(trans('workinghours.actions.save')) }}
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

            $('.company').change(function () {
                if ($(this).val() != '') {
                    var id = $(this).val();
                    var dependent = $(this).data('dependent');

                    $.ajax({
                        url: "{{route('dashboard.companies.index')}}" + '/' + id + '/cities',
                        type: 'get',
                        success: function (data) {
                            $("#" + dependent).empty().html(data);
                        }

                    });
                }

            });

        });

    </script>
@endpush
