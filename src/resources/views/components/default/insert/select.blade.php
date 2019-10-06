<div class="form-group">
	<label class="text-capitalize" for="{{ $key }}">
		{{ str_replace("_", " ", $key) }}
	</label>

	<select class="form-control" name="{{ $key }}" id="{{ str_replace("_", " ", $key) }}">
		@if(@$selected)
			@foreach($field['options'] as $option_key => $option)
				<option @if($option_key == $selected) selected @endif value="{{ $option_key }}">
					{{ str_replace("_", " ", $option) }}
				</option>
			@endforeach
		@else
			<option class="text-capitalize" selected value="">{{ str_replace("_", " ", $key) }}...</option>
			@foreach($field['options'] as $option_key => $option)
				<option value="{{ $option_key }}">{{ str_replace("_", " ", $option) }}</option>
			@endforeach
		@endif
	</select>
	@if ($errors->has($key))
		<div class="invalid-feedback d-block">
			{{ $errors->first($key) }}
		</div>
	@endif
</div>
