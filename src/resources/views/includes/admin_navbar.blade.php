<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('wire.dashboard') }}">{{ config('wire.name') }}</a>
    <input class="form-control form-control-dark a_n_search_input" type="text" placeholder="Search" aria-label="Search">

    <div class="pl-4 pr-1">
        <button class="navbar-toggler border-0 user_actions_slide user_actions_toggler" id="user_actions_slide">
            <i class="fas fa-align-left"></i>
        </button>
        <button class="navbar-toggler border-0 d-none user_actions_close user_actions_toggler" id="user_actions_close">
            <i class="fas fa-times"></i>
        </button>
    </div>
</nav>
