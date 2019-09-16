<nav class="navbar bg-light fixed-top flex-md-nowrap p-0 border-bottom">
    <a class="text-info navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('wire.dashboard') }}">{{ config('wire.name') }}</a>

    <div class="pr-3">
        <span class="border-0 user_actions_toggler button_svg_icon transparent_button cursor-pointer" id="user_actions_slide">
            <svg class="button_svg_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </span>
    </div>
</nav>
