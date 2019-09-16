@section('style')
	<link href="{{ asset('wire-assets/css/external/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endsection

<div class="form-group">
	<div class="mb-4">
		<label for="{{ $key }}">{{ str_replace("_", " ", $key) }}</label>
		<textarea id="{{ $key }}" name="{{ $key }}">{{old($key) ? old($key) : @$record }}</textarea>
		@if ($errors->has($key))
			<div class="invalid-feedback d-block">
				{{ $errors->first($key) }}
			</div>
		@endif
	</div>
</div>

@section('script')
	<script src="{{ asset('wire-assets/js/external/summernote-bs4.js') }}"></script>
	<script>
        var field_name = '{{ $key }}';
        $('#' + field_name).summernote({
            placeholder: '{{ str_replace("_", " ", $key) }}',
            tabsize: 2,
            height: 200
        });
	</script>
@endsection
