<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<link href="{{ asset('wire-assets/css/admin/style.css') }}" rel="stylesheet">
	@include('wire.views.includes.css')
	@include('wire.views.includes.js')

	@yield('style')
</head>
<body class="bg-light">

@include('wire.views.includes.navbar')
<div class="container-fluid">
	<div class="row my-0">
		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 master-body">
			@include('wire.views.includes.side_navbar')
			<div class="col-md-12 py-0 container-fluid mt-5">
				@yield('content')
				@include('wire.views.includes.footer')
			</div>
		</main>
	</div>
</div>
@include('wire.views.includes.user_actions')
@include('wire.views.includes.toast_message')

@yield('script')
</body>
</html>
