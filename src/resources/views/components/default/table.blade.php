@if(!$data->isEmpty())
    <table class="table table-borderless px-3">
        <thead class="bg-light">
        <tr class="px-3">
            @foreach($fields as $header_key => $header_value)
                @if(@$header_value['available_in'] && in_array('index', $header_value['available_in'], true))
                    <th class="px-4 py-3">
                        <span class="text-capitalize">{{ str_replace("_", " ", $header_key) }}</span>
                    </th>
                @endif
            @endforeach
            <th>
                <i class="fas fa-toolbox mr-2"></i>{{ trans('wire::button_input.actions') }}
            </th>
        </tr>
        </thead>

        <tbody>

        @foreach($data as $record)
            <tr>
                @foreach($fields as $key => $value)
                    @if(@$value['available_in'] && in_array('index', $value['available_in'], true))
                        <td class="px-4 py-3">
                            @component('wire.views.components.default.table.'.$value['type'],
                                [
                                    'record' => $record,
                                    'parameters' => $value,
                                    'key' => $key,
                                    'model' => $model
                                ])
                            @endcomponent
                        </td>
                    @endif
                @endforeach
                <td class="position-relative center">
                    <div class="table-actions position-absolute" style="left:0; top:7px">
                        @if(@$custom_slot == true)
                            <a href="{{ route('wire.restore', ['identifier' => $model, 'id' => $record['id']]) }}"
                               class="btn mr-2 btn-sm btn-outline-success btn-lg"
                               role="button" aria-pressed="true">
                                <i class="fas fa-leaf"></i>
                            </a>
                            <form class="d-inline" action="{{route('wire.destroy',['identifier' => $model, 'id' => $record['id']])}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input hidden name="force_delete" value="true">
                                <button class="btn mr-2 btn-sm btn-outline-danger btn-lg" type="submit">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        @else
                            <a href="{{ route('wire.show', ['identifier' => $model, 'id' => $record['id']]) }}"
                               class="btn mr-2 btn-sm btn-outline-info btn-lg"
                               role="button" aria-pressed="true">
                                <i class="fas fa-clipboard-list"></i>
                            </a>

                            <a href="{{ route('wire.edit', ['identifier' => $model, 'id' => $record['id']]) }}"
                               class="btn mr-2 btn-sm btn-outline-primary btn-lg"
                               role="button" aria-pressed="true">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <form class="d-inline" action="{{route('wire.destroy',['identifier' => $model, 'id' => $record['id']])}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn mr-2 btn-sm btn-outline-danger btn-lg" type="submit">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <div class="p-2">
        <div class="text-center p-5 bg-light border rounded text-info h6 mb-0">
            <i class="far fa-folder-open mr-2"></i> {{ trans('wire::wire.nothing_to_show') }}
        </div>
    </div>
@endif
