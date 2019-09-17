@if($data)
	<table class="table table-borderless mb-0">
		<tbody>
		@foreach($fields as $field_key => $field_value)
			@if(@$field_value['available_in'] && in_array($method, $field_value['available_in'], true))
				<tr>
					<th class="text-uppercase bg-light px-4 py-3 text-dark">{{ str_replace("_", " ", $field_key) }}</th>

					<td class="px-4 py-3 text-dark">
						@component('wire.views.components.default.table.'.$field_value['type'],
							[
								'record' => $data,
								'parameters' => $field_value,
								'key' => $field_key,
								'model' => $identifier['model']
							])

						@endcomponent
					</td>
				</tr>
			@endif
		@endforeach
		</tbody>
	</table>

@else
	@component('wire.views.components.default.nothing_to_show')
	@endcomponent
@endif
