@extends('wire.layouts.admin_master')

@section('content')

    @component('wire.components.includes.crud_actions', ['module' => $model])
    @endcomponent

    <div class="col-md-12 mb-5">
        <form class="mb-4" method="post" action="{{ route('wire.store', $model) }}" enctype="multipart/form-data">
            @csrf

            @component('wire.components.default.form', [
                'fields' => $fields,
                'model' => $model,
                'method' => 'create',
                'selected' => @$selected
            ])
            @endcomponent

            <button type="submit" class="btn btn-primary">{{ trans('wire::button_input.create') }}</button>
        </form>
    </div>
@endsection
