<?php

namespace rapkit\wire\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class MakeIdentifier extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * the variable takes the Identifier name
	 *
	 * @var string
	 */
	protected $signature = 'wire:identifier {name}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Make a new Identifier';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		if (!class_exists($identifier = "App\\Wire\\Identifiers\\" . $this->argument('name'), false))
		{
			$model = null;

			$fields = null;

			$this->info('Discovering the model: ' . $model = config('wire.model_path') . $this->argument('name'));

			if (class_exists($model))
			{
				$this->info("Model exists, Creating Identifier and binding Model..");
			}
			else
			{
				$this->info("Model does not exist, Creating Identifier .. .");
			}

			$stub = $this->getStub($this->argument('name'), $fields, $model);

			$path = app_path("Wire/Identifiers/" . $this->argument('name') . ".php");

			file_put_contents($path, $stub);

			Artisan::call('identifier:load', ['name' => $this->argument('name')]);
			Artisan::call('identifier:cache ' . "--identifier=" . $this->argument('name'));

			$this->info("Identifier was created. don't forget to modify fields for convenient output");
		}
		else
		{
			$this->info("An Identifier with the name " . $identifier . " already exists");
		}
	}


	/**
	 * Returns stub content with the model name and fields pre injected
	 *
	 * @param $className
	 * @param $fields
	 * @param $model
	 * @return false|mixed|string
	 */
	protected function getStub($className, $fields, $model)
	{
		$stub = file_get_contents(__DIR__ . './../stubs/identifier.stub');

		$stub = str_replace('{{name}}', $className, $stub);

		$stub = str_replace('{{fields}}', $fields, $stub);

		$stub = str_replace('{{model}}', $model, $stub);

		return $stub;
	}
}
