@extends('wire.views.layouts.master')

@section('content')
	<div class="shadow rounded bg-white overflow-auto">
		@component('wire.views.includes.crud_actions', ['module' => $model])
			<a href="{{ route('wire.edit', [$model, $data->id]) }}" class="svg_button text-capitalize btn btn-light font-weight-bold mr-2" role="button"
			   aria-pressed="true">
				<svg class="button_svg_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 325.174 325.174" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 325.174 325.174">
					<path d="M292.047,88.799L76.43,304.415l-55.758-55.758L236.289,33.041L292.047,88.799z"></path>
					<polygon points="72.499,308.344 0.084,325.174 16.741,252.588"></polygon>
					<path d="m268.75,.579c-2.896,1.753-6.383,4.736-9.907,8.124l-5.435-5.435c-3.606-3.606-12.065-0.991-18.896,5.84l-95.858,95.858c-6.832,6.832-9.447,15.291-5.841,18.896l.144,.144c0.986-1.384 2.137-2.753 3.447-4.063l95.858-95.858c6.325-6.325 14.039-9.026 18.01-6.529-5.594,6.117-9.883,11.382-9.883,11.382l55.759,55.758c0,0 21.73-12.915 28.36-28.36s-45.375-62.042-55.758-55.757z"></path>
				</svg>
			</a>
		@endcomponent

		@component('wire.views.components.default.detail_table', [
		'fields' => $identifier['main_identifier']['fields'],
		'data' => $data,
		'identifier' => $identifier['main_identifier'],
		'method' => $method
		])
		@endcomponent
	</div>


	@foreach($data->getRelations() as $key => $relationship)
		<div class="my-5 shadow-sm rounded bg-white overflow-auto">
			@if($identifier['sub_identifier'][$key]['type'] == "hasMany")
				@component('wire.views.includes.crud_actions', [
					'module' => strtolower(class_basename($identifier['sub_identifier'][$key]['identifier'])),
					"parent" => "?parent=".class_basename($identifier['main_identifier']['model'])."&id=".$data->id,
					'relation' => '<span class="text-secondary small">'.trans("wire::page_names.hasMany").'</span>'
				])
				@endcomponent

				@component('wire.views.components.default.table', [
						   'fields' => $identifier['sub_identifier'][$key]['fields'],
						   'data' => $relationship,
						   'model' => strtolower(class_basename($identifier['sub_identifier'][$key]['identifier']))
						   ])
				@endcomponent

			@elseif($identifier['sub_identifier'][$key]['type'] == "belongsTo")
				<div class="border-bottom border-light row col-md-12 p-0 m-0">
					<div class="col-md-6 px-4 py-3">
                        <span class="text-capitalize h4">
                            <span class="text-secondary small">{{ trans('wire::page_names.belongsTo') }}</span> {{ class_basename($identifier['sub_identifier'][$key]['identifier']) }}
                        </span>
					</div>
					<div class="col-md-6 px-4 py-3" style="line-height: 2.5">
                        <span class="float-right">
                            @if($relationship)
		                        <a href="{{ route('wire.edit', [
                                            strtolower(class_basename($identifier['sub_identifier'][$key]['identifier'])),
                                            $relationship->id
                                            ])
                                            }}
				                        "
		                           class="text-capitalize btn btn-light font-weight-bold mr-1" role="button" aria-pressed="true">
                                <svg class="button_svg_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 325.174 325.174" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 325.174 325.174">
                                    <path d="M292.047,88.799L76.43,304.415l-55.758-55.758L236.289,33.041L292.047,88.799z"></path>
                                    <polygon points="72.499,308.344 0.084,325.174 16.741,252.588  "></polygon>
                                    <path d="m268.75,.579c-2.896,1.753-6.383,4.736-9.907,8.124l-5.435-5.435c-3.606-3.606-12.065-0.991-18.896,5.84l-95.858,95.858c-6.832,6.832-9.447,15.291-5.841,18.896l.144,.144c0.986-1.384 2.137-2.753 3.447-4.063l95.858-95.858c6.325-6.325 14.039-9.026 18.01-6.529-5.594,6.117-9.883,11.382-9.883,11.382l55.759,55.758c0,0 21.73-12.915 28.36-28.36s-45.375-62.042-55.758-55.757z"></path>
                                </svg>
                                    </a>
	                        @endif
                            <a href="{{ route('wire.create', strtolower(class_basename($identifier['sub_identifier'][$key]['identifier']))) }}{{ "?parent=".class_basename($identifier['main_identifier']['model'])."&id=".$data->id }}"
                               class="text-uppercase btn btn-primary font-weight-bold" role="button" aria-pressed="true">
                                {{ trans('wire::button_input.create') }}
                            </a>
                        </span>
					</div>
				</div>

				@component('wire.views.components.default.detail_table', [
						'fields' => $identifier['sub_identifier'][$key]['fields'],
						'data' => $relationship,
						'identifier' => $identifier['sub_identifier'][$key],
						'method' => $method
						])
				@endcomponent
			@elseif($identifier['sub_identifier'][$key]['type'] == "hasOne")
				<div class="border-bottom border-light row col-md-12 p-0 m-0">
					<div class="col-md-6 px-4 py-3">
                        <span class="text-capitalize h4" style="line-height: 1.5">
                            <span class="text-secondary small">{{ trans('wire::page_names.hasOne') }}</span> {{ class_basename($identifier['sub_identifier'][$key]['identifier']) }}
                        </span>
					</div>
					<div class="col-md-6 px-4 py-3" style="line-height: 2.5">
                        <span class="float-right">
                            @if($relationship)
		                        <a href="{{ route('wire.edit', [
                                        strtolower(class_basename($identifier['sub_identifier'][$key]['identifier'])),
                                        $relationship->id
                                        ])
                                        }}
				                        "
		                           class="svg_button text-capitalize btn btn-light font-weight-bold" role="button" aria-pressed="true">
                                <svg class="button_svg_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 325.174 325.174" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 325.174 325.174">
                                    <path d="M292.047,88.799L76.43,304.415l-55.758-55.758L236.289,33.041L292.047,88.799z"></path>
                                    <polygon points="72.499,308.344 0.084,325.174 16.741,252.588  "></polygon>
                                    <path d="m268.75,.579c-2.896,1.753-6.383,4.736-9.907,8.124l-5.435-5.435c-3.606-3.606-12.065-0.991-18.896,5.84l-95.858,95.858c-6.832,6.832-9.447,15.291-5.841,18.896l.144,.144c0.986-1.384 2.137-2.753 3.447-4.063l95.858-95.858c6.325-6.325 14.039-9.026 18.01-6.529-5.594,6.117-9.883,11.382-9.883,11.382l55.759,55.758c0,0 21.73-12.915 28.36-28.36s-45.375-62.042-55.758-55.757z"></path>
                                </svg>
                                </a>
	                        @else
		                        <a href="{{ route('wire.create', strtolower(class_basename($identifier['sub_identifier'][$key]['identifier']))) }}{{ "?parent=".class_basename($identifier['main_identifier']['model'])."&id=".$data->id }}"
		                           class="text-capitalize btn btn-primary font-weight-bold mr-1" role="button" aria-pressed="true">
	                                <i class="fas fa-plus mr-1"></i>
                                    {{ trans('wire::button_input.create') }}
                            </a>

	                        @endif
                        </span>
					</div>
				</div>

				@component('wire.views.components.default.detail_table', [
						'fields' => $identifier['sub_identifier'][$key]['fields'],
						'data' => $relationship,
						'identifier' => $identifier['sub_identifier'][$key],
						'method' => $method
						])
				@endcomponent
			@endif
		</div>
	@endforeach
@endsection