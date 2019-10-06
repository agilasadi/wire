<div class="form-group">
	<label class="text-capitalize" for="{{ $key }}">{{ str_replace("_", " ", $key) }}</label>

	<input type="password" class="form-control" id="{{ $key }}" name="{{ $key }}"
	       placeholder="{{ str_replace("_", " ", $key) }}"
	       value="{{ old($key) ? old($key) : "" }}">

	@if ($errors->has($key))
		<div class="invalid-feedback d-block">
			{{ $errors->first($key) }}
		</div>
	@endif
</div>
