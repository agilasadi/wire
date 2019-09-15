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
						<a class="nav-link s_b_anchor" href="{{ route('wire.index', $class_key) }}">
							<i class="mr-2 s_b_icons fas fa-cubes"></i>
							{{ basename($class_value) }}
						</a>
					</li>
				@endforeach
			@endif
		</ul>
		@include('wire.views.includes.footer')
	</div>
</nav>
