<div class="form-group">
	<label class="text-capitalize" for="{{ $key }}">{{ str_replace("_", " ", $key) }}</label>

	<textarea type="text"
			  class="form-control"
			  id="{{ $key }}"
			  name="{{ $key }}"
			  placeholder="{{ str_replace("_", " ", $key) }}">
        {{ old($key) ? old($key) : @$record }}
    </textarea>

	@if ($errors->has($key))
		<div class="invalid-feedback d-block">
			{{ $errors->first($key) }}
		</div>
	@endif
</div>
