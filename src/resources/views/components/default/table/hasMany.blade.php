@if($record && $record->{$key})
	{{ $record->{$key}->count() }}
@else
	—
@endif
