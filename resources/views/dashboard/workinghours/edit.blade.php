@extends('layouts.backend')

@section('title')
    @lang('workinghours.actions.list') | @lang('workinghours.actions.edit')
@endsection

@section('content')
    <input type="hidden" id="id" name="id" value="{{$workinghour->id}}">
    {{ html()->form('POST', route('dashboard.workinghours.update',$workinghour))->class('form-horizontal')->acceptsFiles()->open() }}

    @method('PUT')

    <div class="card my-4">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('workinghours.actions.list')
                        <small class="text-muted">@lang('workinghours.actions.edit')</small>
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
                            <select class="form-control  company" name="company_id" style="width: 100%">
                                <option disabled >{{trans('companies.html.choose-company')}}</option>
                                @foreach($companies as $company)
                                    <option {{$workinghour->company_id == $company->id ? 'selected' : ''}}  value="{{$company->id}}">{{$company->name}}</option>
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
                                ->value($workinghour->date)
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
                                ->value($workinghour->start)
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
                                ->value($workinghour->end)
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
                                ->value($workinghour->interval)
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

            $(document).ready(function () {
                var id = $('#id').val();

                $.ajax({
                   url: "{{route('dashboard.workinghours.index')}}"+ '/' + id + '/cities',
                   type: 'get',
                    success: function (data) {
                        $('#city').empty().html(data);
                    }
                });

            });

            $('.company').change(function () {
                if ($(this).val() != '') {
                    var id = $(this).val();

                    $.ajax({
                        url: "{{route('dashboard.companies.index')}}" + '/' + id + '/cities',
                        type: 'get',
                        success: function (data) {
                            $("#city").empty().html(data);
                        }

                    });
                }

            });

        });

    </script>
@endpush

