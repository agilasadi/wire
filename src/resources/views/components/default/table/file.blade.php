@if($record[$key] != null)
	<a class="{{ @$class }}"
	   @if(@$parameters['disk'])
	   href="{{asset('storage/'. @$parameters['disk'].'/'.$record[$key])}}"
	   @else
	   href="{{asset('storage/'.$record[$key])}}"
	   @endif
	   download>
		<div class="float-left position-relative mr-2" style="width:32px; height:1px">
			<img class="position-absolute" style="top: -2px; height: 28px" src="{{ asset('wire-assets/wire-images/svg/file-6.svg') }}">
		</div>
		{{ trans('wire::wire.download') }}
	</a>
@else
	—
@endif
{{ $slot }}
