<?php

namespace rapkit\wire\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class IdentifierCache extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'identifier:cache {--identifier=}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Updated List of objects to output in the nav bar';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		if (!$this->option('identifier'))
		{
			$classes = [];

			$identifiers = glob((app_path('Wire/Identifiers/*.php')));

			foreach ($identifiers as $identifier)
			{
				if (class_basename($identifier) != "BaseIdentifier.php")
				{
					$route_prefix = strtolower(str_replace(".php", "", class_basename($identifier)));

					$class_name = "App\\Wire\\Identifiers\\" . str_replace(".php", "", class_basename($identifier));

					$classes[$route_prefix] = $class_name;
				}
			}
		}
		elseif (class_exists($identifier = "App\\Wire\\Identifiers\\" . $this->option('identifier')))
		{
			$route_prefix = strtolower(class_basename($identifier));

			$classes = Cache::get('identifier_classes');

			$classes[$route_prefix] = $identifier;
		}

		Cache::forever('identifier_classes', $classes);

		$this->info("Identifier cache was updated");
	}
}
