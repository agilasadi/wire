@extends('wire.views.layouts.master')

@section('content')
    @component('wire.views.includes.crud_actions', ['module' => $model])
    @endcomponent

    @component('wire.views.components.default.table', ['fields' => $fields, 'data' => $data, 'model' => $model, 'custom_slot' => true])
    @endcomponent
@endsection
