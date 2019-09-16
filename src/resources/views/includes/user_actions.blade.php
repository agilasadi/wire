<div class="position-fixed vh-100 bg-white user_sidebar user_actions shadow" id="user_actions">
    <div class="card-header">
        User Actions
        <span class="close py-1 user_actions_toggler svg_button transparent_button cursor-pointer" id="user_actions_slide">
            <svg class="button_svg_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"></path>
            </svg>
        </span>
    </div>

    <div class="card-body">
        <h5 class="card-title">
            {{ Auth::user()->name }}
            <br>
            <small class="text-muted">{{ Auth::user()->email }}</small>
        </h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="{{ route('wire.logout') }}" class="btn btn-outline-danger svg_button">
            <svg class="button_svg_icon mr-2" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 471.2 471.2" xml:space="preserve">
                <path d="M227.619,444.2h-122.9c-33.4,0-60.5-27.2-60.5-60.5V87.5c0-33.4,27.2-60.5,60.5-60.5h124.9c7.5,0,13.5-6,13.5-13.5
			    s-6-13.5-13.5-13.5h-124.9c-48.3,0-87.5,39.3-87.5,87.5v296.2c0,48.3,39.3,87.5,87.5,87.5h122.9c7.5,0,13.5-6,13.5-13.5
			    S235.019,444.2,227.619,444.2z"></path>
                <path d="M450.019,226.1l-85.8-85.8c-5.3-5.3-13.8-5.3-19.1,0c-5.3,5.3-5.3,13.8,0,19.1l62.8,62.8h-273.9c-7.5,0-13.5,6-13.5,13.5
			    s6,13.5,13.5,13.5h273.9l-62.8,62.8c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4l85.8-85.8
			    C455.319,239.9,455.319,231.3,450.019,226.1z"></path>
            </svg>
            {{ trans('wire::authentication.sign_out') }}
        </a>
    </div>


    <div class="card text-white bg-dark my-3 mx-3" style="max-width: 18rem;">
        <div class="card-header svg_button">
            <svg class="button_svg_icon mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M7 17H2a2 2 0 0 1-2-2V2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2h-5l4 2v1H3v-1l4-2zM2 2v11h16V2H2z"></path>
            </svg>
            Status
        </div>
        <div class="card-body">
            <h5 class="card-title">Dark card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
        </div>
    </div>
</div>
