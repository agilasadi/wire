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
						<a class="nav-link s_b_anchor" href="{{ route('wire.index', ['route' => $class_key]) }}">
							<i class="mr-2 s_b_icons fas fa-cubes"></i>
							{{ basename($class_value) }}
						</a>
					</li>
				@endforeach
			@endif
		</ul>

		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
			<span>Accepted Projects</span>
			<a class="d-flex align-items-center text-muted" href="#">
				<span data-feather="plus-circle"></span>
			</a>
		</h6>
		<ul class="nav flex-column mb-2">
			<li class="nav-item">
				<a class="nav-link" href="#">
					<span data-feather="file-text"></span>
					Current month
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">
					<span data-feather="file-text"></span>
					Last quarter
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">
					<span data-feather="file-text"></span>
					Social engagement
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">
					<span data-feather="file-text"></span>
					Year-end sale
				</a>
			</li>
		</ul>
		<footer>
			<div class="p-3">
				<div class="d-flex border-top">
					<p class="mb-0 mt-3 text-dark">&copy; {{ now()->year }}
						<b>{{ config('wire.name') }}</b> <br>
						<span class="small text-muted">{{ trans('wire::heading.all_rights_reserved') }}</span>
					</p>
				</div>
			</div>
			<div class="pl-1">
				<div>Icons made by
					<a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a>
                    from
					<a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>
					is licensed by
					<a href="http://creativecommons.org/licenses/by/3.0/"
                       title="Creative Commons BY 3.0" target="_blank">
                        CC 3.0 BY
                    </a>
				</div>
			</div>
		</footer>
	</div>
</nav>
