<?php

namespace Rapkit\Wire\Scripts;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class CacheIdentifierClasses
{
	/**
	 * Attempys to cache Identifiers if the list is empty.
	 */
	public static function checkIdentifierCache()
	{
		if (!$identifier = Cache::get('identifier_classes'))
		{
			Artisan::call('identifier:cache');
		}
	}
}
