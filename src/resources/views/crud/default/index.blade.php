@extends('wire.layouts.admin_master')

@section('content')
	@component('wire.components.includes.crud_actions', ['module' => $model])
	@endcomponent

	@component('wire.components.default.table', ['fields' => $fields, 'data' => $data, 'model' => $model])
	@endcomponent
@endsection
