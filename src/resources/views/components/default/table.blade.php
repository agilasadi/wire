<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
	<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('wire.dashboard') }}">{{ config('wire.name') }}</a>
	<input class="form-control form-control-dark a_n_search_input" type="text" placeholder="Search" aria-label="Search">

	<div class="pr-3">
        <span class="border-0 text-light user_actions_toggler button_svg_icon transparent_button cursor-pointer" id="user_actions_slide">
            <svg class="button_svg_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </span>
	</div>
</nav>
