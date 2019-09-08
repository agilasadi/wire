@if($record && $record->{$parameters['method']} )
	<a href="{{ route('wire.show', ['route' => strtolower(basename($parameters["identifier"])), 'id' => $record->{$parameters['method']}->id]) }}">
		{{ @$parameters['title'] ? $record->{$parameters['method']}->{$parameters['title']} : $record->{$parameters['method']}->id }}
	</a>
@else
	—
@endif
