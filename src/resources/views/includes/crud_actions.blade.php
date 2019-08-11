<div class="mt-5 mb-4 col-md-12 px-0">
    <p class="my-4 h4">
        <span class="text-capitalize">{{ str_replace("_", " ", $module) }}</span>
        <span class="float-right">
            {{ $slot }}
            <a href="{{ route('wire.create', $module) }}{{ @$parent }}" class="text-capitalize btn btn-primary font-weight-bold mr-1" role="button"
               aria-pressed="true">
	            <i class="fas fa-plus mr-1"></i>
                {{ trans('button_input.create') }}
                {{ $module }}
            </a>

            <a href="{{ route('wire.recycle', $module) }}" class="text-capitalize btn btn-success font-weight-bold" role="button"
               aria-pressed="true">
	            <i class="fas fa-recycle mr-1"></i>
                {{ trans('button_input.recycle') }}
                {{ $module }}
            </a>
        </span>
    </p>
</div>
