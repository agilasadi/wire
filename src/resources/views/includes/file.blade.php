{{ $slot }}
@if($image != null)
    <a class="{{ $class }}" href="{{asset('storage/'. @$disk."/".$image)}}" style="width: {{$width ? $width : 'auto'}}; height: {{$height ? $height : 'auto'}}" download>
@else
    —
@endif
