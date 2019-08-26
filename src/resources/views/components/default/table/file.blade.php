@if($record[$key] != null)
	<a @if(@$parameters['disk'])
	   href="{{asset('storage/'. @$parameters['disk'].'/'.$record[$key])}}"
	   @else
	   href="{{asset('storage/'.$record[$key])}}"
	   @endif download>
		<div class="float-left position-relative mr-2" style="width:32px; height:1px">
			<svg class="position-absolute" style="enable-background:new 0 0 58 58; top: -2px; height: 28px" version="1.1" id="Capa_1"
			     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
			     x="0px" y="0px" viewBox="0 0 58 58" xml:space="preserve">
				<g>
					<polygon style="fill:#EFEBDE;" points="46.5,14 32.5,0 1.5,0 1.5,58 46.5,58"></polygon>
					<g>
						<path style="fill:#D5D0BB;" d="M11.5,23h25c0.552,0,1-0.447,1-1s-0.448-1-1-1h-25c-0.552,0-1,0.447-1,1S10.948,23,11.5,23z"></path>
						<path style="fill:#D5D0BB;" d="M11.5,15h10c0.552,0,1-0.447,1-1s-0.448-1-1-1h-10c-0.552,0-1,0.447-1,1S10.948,15,11.5,15z"></path>
						<path style="fill:#D5D0BB;" d="M36.5,29h-25c-0.552,0-1,0.447-1,1s0.448,1,1,1h25c0.552,0,1-0.447,1-1S37.052,29,36.5,29z"></path>
						<path style="fill:#D5D0BB;" d="M36.5,37h-25c-0.552,0-1,0.447-1,1s0.448,1,1,1h25c0.552,0,1-0.447,1-1S37.052,37,36.5,37z"></path>
						<path style="fill:#D5D0BB;" d="M36.5,45h-25c-0.552,0-1,0.447-1,1s0.448,1,1,1h25c0.552,0,1-0.447,1-1S37.052,45,36.5,45z"></path>
					</g>
					<polygon style="fill:#D5D0BB;" points="32.5,0 32.5,14 46.5,14"></polygon>
				</g>
				<g>
					<rect x="34.5" y="36" style="fill:#21AE5E;" width="22" height="22"></rect>
					<rect x="44.5" y="37.586" style="fill:#FFFFFF;" width="2" height="16"></rect>
					<polygon style="fill:#FFFFFF;" points="45.5,55 38.5,48.293 39.976,46.879 45.5,52.172 51.024,46.879 52.5,48.293"></polygon>
				</g>
				</svg>
		</div>
		{{ trans('wire::wire.download') }}
	</a>
@else
	—
@endif
{{ $slot }}
