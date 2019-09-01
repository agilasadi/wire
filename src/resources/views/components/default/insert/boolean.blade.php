<div class="form-group">
    <label class="text-capitalize" for="{{ $key }}">
        {{ str_replace("_", " ", $key) }}
    </label>
    <select class="form-control" required name="{{ $key }}" id="{{ $key }}">
        @if($selected != 1 || $selected != 0)
            @if($selected == 1)
                <option selected value="1">
                    {{ trans('wire::button_input.true') }}
                </option>
                <option value="0">
                    {{ trans('wire::button_input.false') }}
                </option>
            @elseif($selected == 0)
                <option selected value="0">
                    {{ trans('wire::button_input.false') }}
                </option>
                <option value="1">
                    {{ trans('wire::button_input.true') }}
                </option>
            @endif
        @else
            <option class="text-capitalize" value="1">
                {{ trans('wire::button_input.true') }}
            </option>
            <option class="text-capitalize" value="0">
                {{ trans('wire::button_input.false') }}
            </option>
        @endif

    </select>
    @if ($errors->has($key))
        <div class="invalid-feedback d-block">
            {{ $errors->first($key) }}
        </div>
    @endif
</div>
