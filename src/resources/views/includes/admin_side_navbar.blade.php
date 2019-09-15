<nav class="col-md-2 d-none d-md-block sidebar mt-5">
	<div class="sidebar-sticky">
		<ul class="nav flex-column">
			<li class="nav-item pb-2">
				<a class="nav-link d-flex inline align-items-center s_b_anchor @if(Request::route()->getName() == 'wire.dashboard') active @endif" href="{{ route('wire.dashboard') }}">
					<svg style="fill: currentColor" class="s_b_icons fill-current mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
						<path d="M16 16v2H4v-2H0V4h4V2h12v2h4v12h-4zM14 5.5V4H6v12h8V5.5zm2 .5v8h2V6h-2zM4 6H2v8h2V6z"></path>
					</svg>
					Dashboard <span class="sr-only">(current)</span>
				</a>
			</li>
			@if(cache('identifier_classes'))
				@foreach(cache('identifier_classes') as $class_key => $class_value)
					<li class="nav-item">
						<a class="nav-link d-flex inline align-items-center s_b_anchor {{ Request::is('wire/'.$class_key."*") ? 'active' : ''}}" href="{{ route('wire.index', $class_key) }}">
							<svg style="fill: currentColor" class="s_b_icons mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
								<path d="M20 14v4a2 2 0 0 1-2 2h-4v-2a2 2 0 0 0-2-2 2 2 0 0 0-2 2v2H6a2 2 0 0 1-2-2v-4H2a2 2 0 0 1-2-2 2 2 0 0 1 2-2h2V6c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2 2 2 0 0 1 2 2v2h4a2 2 0 0 1 2 2v4h-2a2 2 0 0 0-2 2 2 2 0 0 0 2 2h2z"></path>
							</svg>
							{{ basename($class_value) }}
						</a>
					</li>
				@endforeach
			@endif
		</ul>
	</div>
</nav>
