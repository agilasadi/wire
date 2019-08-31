@if($record && !$record->{$parameters['method']}->isEmpty() )
    @foreach($record->{$parameters['method']} as $item)
        <a href="{{ route('wire.show', ['route' => strtolower(basename($parameters["identifier"])), 'id' => $item->id]) }}">
            {{ @$parameters['title'] ? $item->{$parameters['title']} : $item->id }}</a>{{ $loop->last ? "" : ", " }}
    @endforeach
@else
    —
@endif
