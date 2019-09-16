@extends('wire.views.layouts.master')

@section('content')
	<div class="shadow rounded bg-white">
		@component('wire.views.includes.crud_actions', ['module' => $model])
		@endcomponent

		<form method="post" action="{{ route('wire.store', $model) }}" enctype="multipart/form-data">
			@csrf
			<div class="col-md-12 pt-3 pb-2 px-4">
				@component('wire.views.components.default.form', [
					'fields' => $fields,
					'model' => $model,
					'method' => 'create',
					'selected' => @$selected
				])
				@endcomponent
			</div>

			<div class="bg-light px-4 py-3 rounded-bottom">
				<button type="submit" class="btn btn-primary text-uppercase font-weight-bold shadow-rg">{{ trans('wire::button_input.create') }}</button>
			</div>
		</form>
	</div>
@endsection
