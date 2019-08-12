{{ dd($field) }}
@section('style')
<link href="{{ asset('application_css/external/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endsection

<div class="form-group">
    <div class="mb-4">
        <label for="{{ $key }}">{{ trans('wire::button_input.'.$key) }}</label>
        <textarea id="{{ $key }}" name="{{ $key }}">{{@$record}}</textarea>
        @if ($errors->has($key))
            <div class="invalid-feedback d-block">
                {{ $errors->first($key) }}
            </div>
        @endif
    </div>
</div>

@section('script')
<script src="{{ asset('application_js/external/summernote-bs4.js') }}"></script>
<script>
    var field_name = '{{ $key }}';
        $('#' + field_name).summernote({
            placeholder: '{{ trans('wire::button_input.'.@$key) }}',
            tabsize: 2,
            height: 200
        });
</script>
@endsection
