<nav class="col-md-2 d-none d-md-block bg-light sidebar">
	<div class="sidebar-sticky">
		<ul class="nav flex-column">
			<li class="nav-item pb-2 border-bottom">
				<a class="nav-link s_b_anchor @if(Request::route()->getName() == 'wire.dashboard') active @endif" href="{{ route('wire.dashboard') }}">
					<i class="mr-2 s_b_icons fas fa-satellite"></i>
					Dashboard <span class="sr-only">(current)</span>
				</a>
			</li>
			@if(cache('identifier_classes'))
				@foreach(cache('identifier_classes') as $class_key => $class_value)
					<li class="nav-item">
						<a class="nav-link d-flex inline align-items-center s_b_anchor {{ Request::is('wire/'.$class_key."*") ? 'active' : ''}}" href="{{ route('wire.index', $class_key) }}">
							<svg style="fill: currentColor" class="s_b_icons fill-current mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
								<path d="M20 14v4a2 2 0 0 1-2 2h-4v-2a2 2 0 0 0-2-2 2 2 0 0 0-2 2v2H6a2 2 0 0 1-2-2v-4H2a2 2 0 0 1-2-2 2 2 0 0 1 2-2h2V6c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2 2 2 0 0 1 2 2v2h4a2 2 0 0 1 2 2v4h-2a2 2 0 0 0-2 2 2 2 0 0 0 2 2h2z"></path>
							</svg>
							{{ basename($class_value) }}
						</a>
					</li>
				@endforeach
			@endif
		</ul>
		@include('wire.views.includes.footer')
	</div>
</nav>
