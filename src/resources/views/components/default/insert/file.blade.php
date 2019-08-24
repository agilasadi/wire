<div class="form-group">
    <label for="{{ $key }}">
        <span role="button" class="btn btn-outline-primary">
            <i class="mr-2 fas fa-image"></i>
            <span class="text-capitalize">{{ $key }}</span>
        </span>
    </label>

    <input class="d-none" name="{{ $key }}" id="{{ $key }}" type="file">

    @if ($errors->has($key))
        <div class="invalid-feedback d-block">
            {{ $errors->first($key) }}
        </div>
    @endif
</div>
{{--{{ dd($key, $field) }}--}}

@if(@$record)
    @component('wire.views.includes.file', [
    'file' => $record,
    'disk' => $field['disk']
    ])
        <h6 class="">
            {{ trans('wire::button_input.file') }}
        </h6>
    @endcomponent
@endif

{{ $slot }}
