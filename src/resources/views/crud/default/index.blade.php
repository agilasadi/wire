@extends('wire.views.layouts.master')

@section('content')
	<div class="shadow rounded bg-white">
		@component('wire.views.includes.crud_actions', ['module' => $model])
		@endcomponent

		@component('wire.views.components.default.table', ['fields' => $fields, 'data' => $data, 'model' => $model])
		@endcomponent
		<div class="bg-light px-4 pt-3 pb-1 rounded-bottom">
			{{ $data->links() }}
		</div>
	</div>
@endsection
