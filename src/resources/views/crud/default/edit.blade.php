@extends('wire.views.layouts.admin_master')

@section('content')

    @component('wire.views.includes.crud_actions', ['module' => $model])
    @endcomponent

    <div class="col-md-12 mb-5">
        <form class="mb-4" method="post" action="{{ route('wire.update', [$model, $data->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            @component('wire.views.components.default.form', ['fields' => $fields,'model' => $model, 'method' => 'edit', 'data' => $data])
            @endcomponent

            <button type="submit" class="btn btn-primary">{{ trans('wire::button_input.update') }}</button>
        </form>
    </div>
@endsection
