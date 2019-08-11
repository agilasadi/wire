@if(@$record && $record[$key])
    {{ $record[$key] }}
@else
    <a class="text-decoration-none" href="#">
        —
    </a>
@endif
