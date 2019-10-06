<div class="form-group">
	<label for="{{ $key }}">
        <span role="button" class="svg_button btn btn-outline-primary">
            <svg class="button_svg_icon mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M0 4c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm11 9l-3-3-6 6h16l-5-5-2 2zm4-4a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"></path>
            </svg>
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

@if(@$record)
	@component('wire.views.includes.image', [
	'image' => $record,
	'width' => '',
	'height' => '5rem',
	'class' => 'rounded border mb-4 mt-2',
	'disk' => $field['disk']
	])
		<h6 class="">
			{{ trans('wire::button_input.image') }}
		</h6>
	@endcomponent
@endif

{{ $slot }}
