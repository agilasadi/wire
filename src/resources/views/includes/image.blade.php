{{ $slot }}
@if($image != null)
    <img class="{{ $class }}" src="{{asset('storage/'. @$disk."/".$image)}}" style="width: {{$width ? $width : 'auto'}}; height: {{$height ? $height : 'auto'}}">
@else
    <img class="{{ $class }}" src="{{asset('application_images/placeholder/no_image.jpg')}}" style="width: {{$width ? $width : 'auto'}}; height: {{$height ? $height : 'auto'}}">
@endif
