@if(session()->has('toast_message'))
    <div style="position: fixed; bottom: 1rem; right: 1rem; z-index: 1031;">
        @foreach(session()->get('toast_message') as $toast_message)
            <div class="toast" role="alert" aria-live="assertive" data-delay="2750" aria-atomic="true">
                <div class="toast-header">
                    <img src="{{ asset('application_images/welcome/asar.jpg') }}" style="width:1.26rem;"
                         class="rounded mr-2" alt="...">
                    <strong class="mr-auto">{{ @$toast_message['title'] }}</strong>
                    <small class="text-muted ml-2"> {{ trans('wire::message.now') }} </small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    {{ @$toast_message['message'] }}
                </div>
            </div>
        @endforeach
    </div>
@endif
