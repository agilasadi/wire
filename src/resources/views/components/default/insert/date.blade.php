<div class="form-group">
	<label for="{{ $key }}">{{ str_replace("_", " ", $key) }}</label>

	<input type="datetime-local" class="form-control" id="{{ $key }}" name="{{ $key }}"
	       placeholder="{{ str_replace("_", " ", $key) }}" value="{{ old($key) ? \Carbon\Carbon::parse(old($key))->format('Y-m-d\TH:i') : \Carbon\Carbon::parse($record)->format('Y-m-d\TH:i') }}">
	@if ($errors->has($key))
		<div class="invalid-feedback d-block">
			{{ $errors->first($key) }}
		</div>
	@endif
</div>
