<?php

namespace Rapkit\Wire\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BeforeWireInterface
{
	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (Auth::check())
		{
			if (Auth::guard(config('wire.wire_guard'))->check() && Gate::allows('access-wire'))
			{
				return $next($request);
			}
		}

		return redirect()->route('wire.login');
	}
}
