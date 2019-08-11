<table class="table table-striped">
	<tbody>
	@if($data)
		@foreach($fields as $field_key => $field_value)
			@if(@$field_value['available_in'] && in_array($method, $field_value['available_in'], true))
				<tr>
					<th class="text-capitalize">{{ str_replace("_", " ", $field_key) }}</th>

					<td>
						@component('wire.components.default.table.'.$field_value['type'],
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
		<p class="text-center p-5 bg-light border rounded text-info h6"><i class="far fa-folder-open mr-2"></i> {{ trans('wire.nothing_to_show') }}</p>
	@endif
	</tbody>
</table>
