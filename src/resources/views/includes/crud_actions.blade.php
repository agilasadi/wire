<div class="mt-5 col-md-12 px-0">
    <p class="py-3 px-4 h4 mb-0 border-bottom border-light">
        <span class="text-capitalize text-indigo-900">{!! @$relation !!} {{ str_replace("_", " ", $module) }}</span>
        <span class="float-right">
            {{ $slot }}
            <a href="{{ route('wire.create', $module) }}{{ @$parent }}" class="text-indigo-900 text-decoration-none crud_action_button text-sm text-capitalize svg_button mr-3"
               aria-pressed="true">
            <svg class="button_svg_icon mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="4 4.5 16 16">
                <path d="M17 11a1 1 0 0 1 0 2h-4v4a1 1 0 0 1-2 0v-4H7a1 1 0 0 1 0-2h4V7a1 1 0 0 1 2 0v4h4z"></path>
            </svg>
                {{ trans('wire::button_input.create') }}
                {{ $module }}
            </a>

            <a href="{{ route('wire.recycle', $module) }}" class="text-indigo-900 text-decoration-none crud_action_button text-sm text-capitalize svg_button">
                <svg class="button_svg_icon mr-2" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 31.479 31.479" xml:space="preserve">
                <path d="M8.476,17.737l2.385,1.408l-3.104-6.16l-6.949,0.207l2.244,1.331L0,20.172c0,0,2.451,4.442,4.122,7.094
			    c0.683,1.084,1.597,1.698,2.474,1.698h8.924V22.53l-9.693-0.003L8.476,17.737z"></path>
                    <path d="M16.691,10.466l6.763,0.405l3.243-6.147l-2.264,1.297L21.02,0.582c0,0-5.073-0.058-8.202,0.093
			    c-1.28,0.062-2.266,0.554-2.697,1.315L5.724,9.757l5.599,3.17l4.778-8.435l2.863,4.665L16.691,10.466z"></path>
                    <path d="M31.23,18.314l-4.245-7.85l-5.659,3.062l4.607,8.527l-5.473-0.053l0.082-2.479l-3.92,5.373l3.487,6.014l0.103-2.606
			    l6.422-0.003c0,0,2.742-4.27,4.277-7C31.542,20.182,31.647,19.087,31.23,18.314z"></path>
                 </svg>
                {{ trans('wire::button_input.recycle') }}
                {{ $module }}
            </a>
        </span>
    </p>
</div>
