<div class="form-group">
    <label for="{{ $key }}">
        {{ str_replace("_", " ", $key) }}
    </label>
    @if(@$pre_selected && strtolower(class_basename($field['model'])) == strtolower($pre_selected['key']))
        <select class="form-control" readonly name="{{ $key }}" id="{{ $key }}">
            @foreach($field['data'] as $option)
                <option @if($option["id"] == $pre_selected["value"]) selected @endif value="{{ $option["id"] }}">{{ $option[$field['title']] }} - {{$selected}}</option>
            @endforeach
        </select>
    @else
        <select class="form-control" name="{{ $key }}" id="{{ $key }}">
            <option selected value="">{{ str_replace("_", " ", $key) }}...</option>
            @if(@$selected && $selected != null)
                @foreach($field['data'] as $option)
                    <option @if($option["id"] == $selected) selected @endif value="{{ $option["id"] }}">{{ $option[$field['title']] }} - {{$selected}}</option>
                @endforeach
            @else
                @foreach($field['data'] as $option)
                    <option value="{{ $option["id"] }}">{{ $option[$field['title']] }}</option>
                @endforeach
            @endif
        </select>
    @endif

    @if ($errors->has($key))
        <div class="invalid-feedback d-block">
            {{ $errors->first($key) }}
        </div>
    @endif
</div>
