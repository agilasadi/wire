@extends('wire.views.layouts.admin_master')

@section('content')
    @component('wire.views.includes.crud_actions', ['module' => $model])
        <a href="{{ route('wire.edit', [$model, $data->id]) }}" class="text-capitalize btn btn-light font-weight-bold mr-1" role="button"
           aria-pressed="true">
            <i class="fas fa-pencil-alt"></i>
        </a>
    @endcomponent

    @component('wire.views.components.default.detail_table', [
    'fields' => $identifier['main_identifier']['fields'],
    'data' => $data,
    'identifier' => $identifier['main_identifier'],
    'method' => $method
    ])
    @endcomponent

    @foreach($data->getRelations() as $key => $relationship)
        <div class="py-4">
            @if($identifier['sub_identifier'][$key]['type'] == "hasMany")
                @component('wire.views.includes.crud_actions', [
                    'module' => strtolower(class_basename($identifier['sub_identifier'][$key]['identifier'])),
                    "parent" => "?parent=".class_basename($identifier['main_identifier']['model'])."&id=".$data->id
                ])
                @endcomponent

                @component('wire.views.components.default.table', [
                           'fields' => $identifier['sub_identifier'][$key]['fields'],
                           'data' => $relationship,
                           'model' => strtolower(class_basename($identifier['sub_identifier'][$key]['identifier']))
                           ])
                @endcomponent

            @elseif($identifier['sub_identifier'][$key]['type'] == "belongsTo")
                <div class="mt-5 mb-4 col-md-12 px-0">
                    <p class="my-4 h4">
                        <span class="text-capitalize">
                            {{ class_basename($identifier['sub_identifier'][$key]['identifier']) }}
                        </span>

                        <span class="float-right">
                            @if($relationship)
                                <a href="{{ route('wire.edit', [
                                        strtolower(class_basename($identifier['sub_identifier'][$key]['identifier'])),
                                        $relationship->id
                                        ])
                                        }}
                                    "
                                   class="text-capitalize btn btn-light font-weight-bold mr-1" role="button" aria-pressed="true">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            @endif
                            <a href="{{ route('wire.create', strtolower(class_basename($identifier['sub_identifier'][$key]['identifier']))) }}{{ "?parent=".class_basename($identifier['main_identifier']['model'])."&id=".$data->id }}"
                               class="text-capitalize btn btn-primary font-weight-bold mr-1" role="button" aria-pressed="true">
	                                <i class="fas fa-plus mr-1"></i>
                                    {{ trans('wire::button_input.create') }}
                            </a>
                        </span>
                    </p>
                </div>

                @component('wire.views.components.default.detail_table', [
                        'fields' => $identifier['sub_identifier'][$key]['fields'],
                        'data' => $relationship,
                        'identifier' => $identifier['sub_identifier'][$key],
                        'method' => $method
                        ])
                @endcomponent
            @endif
        </div>
    @endforeach

@endsection
