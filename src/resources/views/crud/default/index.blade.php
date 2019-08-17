@extends('wire.views.layouts.admin_master')

@section('content')
	@component('wire.views.includes.crud_actions', ['module' => $model])
	@endcomponent

	@component('wire.views.components.default.table', ['fields' => $fields, 'data' => $data, 'model' => $model])
	@endcomponent
@endsection
