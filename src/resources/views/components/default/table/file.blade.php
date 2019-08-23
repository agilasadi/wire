@if($record[$key] != null)
	<a class="{{ @$class }}"
	   @if(@$parameters['disk'])
	   href="{{asset('storage/'. @$parameters['disk'].'/'.$record[$key])}}"
	   @else
	   href="{{asset('storage/'.$record[$key])}}"
	   @endif
	   download>
	</a>
@else
	—
@endif
{{ $slot }}
