<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

<!-- Styles -->
    <link href="{{ asset('application_css/admin/style.css') }}" rel="stylesheet">
    @include('wire.includes.general_css')
    @include('wire.includes.general_js')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

    @yield('style')

    <link rel="stylesheet" href="{{ asset('application_css/admin/dashboard.css') }}">
</head>
<body>


@include('wire.includes.admin_navbar')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @include('wire.includes.admin_side_navbar')
            <div class="col-md-12 container-fluid">
            @yield('content')
            </div>
{{--            @include('wire.includes.admin_footer')--}}
        </main>
    </div>
</div>
@include('wire.includes.user_actions')
@include('wire.includes.toast_message')


<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
@yield('script')
</body>
</html>
