<div class="form-group">
    <label class="text-capitalize" for="{{ $key }}">
        {{ str_replace("_", " ", $key) }}
    </label>
    <select class="form-control" required name="{{ $key }}" id="{{ $key }}">
        @if($selected != 1 || $selected != 0)
            @if($selected == 1)
                <option selected value="1">
                    True
                </option>
                <option value="0">
                    False
                </option>
            @elseif($selected == 0)
                <option selected value="0">
                    False
                </option>
                <option value="1">
                    True
                </option>
            @endif
        @else
            <option class="text-capitalize" value="1">
                True
            </option>
            <option class="text-capitalize" value="0">
                False
            </option>
        @endif

    </select>
    @if ($errors->has($key))
        <div class="invalid-feedback d-block">
            {{ $errors->first($key) }}
        </div>
    @endif
</div>
