<table class="table table-borderless mb-0">
	<tbody>
	@if($data)
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
	@else
		<p class="text-center p-5 bg-light border rounded text-info h6">
			<i class="far fa-folder-open mr-2"></i> {{ trans('wire::wire.nothing_to_show') }}</p>
	@endif
	</tbody>
</table>