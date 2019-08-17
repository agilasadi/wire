@foreach($fields as $field_key => $field_value)
	@if(in_array($method, $field_value['available_in'], true))
			@component('wire.views.components.default.insert.'.$field_value['type'], [
					'method' => $method,
					'field' => $field_value,
					'key' => $field_key,
					'record' => @$data ? $data[$field_key] : '' ,
					'selected' => @$data ? $data[$field_key] : old($field_key),
					'pre_selected' => @$selected
				])
			@endcomponent
	@endif
@endforeach
