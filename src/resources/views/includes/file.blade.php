{{ $slot }}
@if($image != null)
    <a href="{{asset('storage/'. @$disk."/".$file)}}" download>
        <img height="28px" src="{{ asset('wire-assets/wire-images/svg/file-6.svg') }}">
        {{ trans('wire::wire.download') }}
    </a>
@else
    —
@endif
