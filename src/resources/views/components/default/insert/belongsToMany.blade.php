<div class="form-group">
	<div class="mb-4">
		<label for="{{ $key }}[]">{{ str_replace("_", " ", $key) }}</label>
		<select class="belongsToManyClass w-100" name="{{ $key }}[]" id="{{ $key }}[]" multiple="multiple">
			@if(@$selected && $selected != null)
				@foreach($field['data'] as $option)
					@if(is_object($selected))
						<option @if($selected->contains("id", $option["id"])) selected @endif value="{{ $option["id"] }}">{{ $option[$field['title']] }}</option>
					@else
						<option @if(in_array($option["id"], $selected)) selected @endif value="{{ $option["id"] }}">{{ $option[$field['title']] }}</option>
					@endif
				@endforeach
			@else
				@foreach($field['data'] as $option)
					<option value="{{ $option["id"] }}">{{ $option[$field['title']] }}</option>
				@endforeach
			@endif
		</select>
		@if ($errors->has($key))
			<div class="invalid-feedback d-block">
				{{ $errors->first($key) }}
			</div>
		@endif
	</div>
</div>

<script>
	$(document).ready(function ()
	{
		$('.belongsToManyClass').select2();
	});
</script>
