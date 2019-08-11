<div class="position-fixed vh-100 bg-white user_sidebar user_actions shadow" id="user_actions">
    <div class="card-header">
        User Actions
        <button type="button" class="close user_actions_toggler" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="card-body">
        <h5 class="card-title">
            {{ Auth::user()->name }}
            <br>
            <small class="text-muted">{{ Auth::user()->email }}</small>
        </h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="{{ route('logout-admin') }}"
           class="btn btn-outline-danger"><i class="fas mr-2 fa-sign-out-alt"></i>{{ trans('authentication.sign_out') }}</a>
    </div>


    <div class="card text-white bg-dark my-3 mx-3" style="max-width: 18rem;">
        <div class="card-header">
            <i class="mr-2 fas fa-file-medical-alt"></i>Status
        </div>
        <div class="card-body">
            <h5 class="card-title">Dark card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
        </div>
    </div>
</div>
