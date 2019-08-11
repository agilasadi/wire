<div class="form-group">
    <label for="{{ $key }}">{{ str_replace("_", " ", $key) }}</label>

    <input type="number" class="form-control" id="{{ $key }}" name="{{ $key }}"
        placeholder="{{ str_replace("_", " ", $key) }}" value="{{ old($key) ? old($key) : @$record }}">

    @if ($errors->has($key))
        <div class="invalid-feedback d-block">
            {{ $errors->first($key) }}
        </div>
    @endif
</div>
