<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description', 'Laravel Boilerplate')">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">

    @stack('before-styles')

    <link rel="stylesheet" href="{{ asset('css/backend.css') }}">

    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>

    @stack('after-styles')
</head>

<body class="app header-fixed sidebar-fixed aside-menu-off-canvas sidebar-lg-show">
@include('includes.header')

<div class="app-body">
    @include('includes.sidebar')

    <main class="main">
        {!! Breadcrumbs::render() !!}

        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="content-header">
                    @yield('page-header')
                </div><!--content-header-->

                @include('includes.partials.messages')
                @yield('content')
            </div><!--animated-->
        </div><!--container-fluid-->
    </main><!--main-->

    @include('includes.aside')
</div><!--app-body-->

@include('includes.footer')

@stack('before-scripts')

<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/backend.js') }}"></script>

<script src="{{ asset('js/select2.full.js') }}"></script>
<script>

    $("select").select2({
        theme: "bootstrap",
        placeholder: '{{ 'احتر من هنا' }}'
    });

    $('.user_select').select2({
        theme: "bootstrap",
        placeholder: '{{ trans('users.actions.search') }}',
//         minimumInputLength: 3,
        ajax: {
            url: '{{ route('api.users') }}',
            dataType: 'json',
            data: function (params) {
                return {
                    name: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data['data']
                };
            },
            cache: true
        }
    });

    $('#flash-overlay-modal').modal();
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

</script>
@stack('after-scripts')
</body>
</html>
