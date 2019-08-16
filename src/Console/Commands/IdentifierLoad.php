<?php

namespace rapkit\wire\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use ReflectionClass;

class IdentifierLoad extends Command
{
	protected $integers = ['tinyint', 'bigint', 'smallint', 'mediumint', 'integer'];
	protected $strings = ['tinytext', 'varchar', 'char'];
	protected $dates = ['date', 'datetime', 'timestamp', 'time', 'year'];
	protected $texts = ['longtext', 'mediumtext', 'text'];

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'identifier:load {name}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Loads fields of the model into the Identifier';

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
		if (class_exists($identifier = "App\\Wire\\Identifiers\\" . $this->argument('name')))
		{
			$this->info("Ckecing identifier: " . $identifier);
			$identifier_class = new $identifier;

			if ($model = $identifier_class->model)
			{
				if (class_exists($model))
				{
					$this->info("Identifier and Model exists, adding up fields");

					if (empty($identifier_class->fields()))
					{
						$this->info("loading....");

						$fields = $this->getFields($model);

						$identifier_stub = file_get_contents(__DIR__ . './../stubs/identifier.stub');

						$identifier_stub = str_replace('{{name}}', $this->argument('name'), $identifier_stub);

						$identifier_stub = str_replace('{{fields}}', $fields, $identifier_stub);

						$identifier_stub = str_replace('{{model}}', $identifier_class->model, $identifier_stub);

						$path = app_path("Wire/Identifiers/" . $this->argument('name') . ".php");

						file_put_contents($path, $identifier_stub);

						$this->info("Fields for " . $identifier . " have been updated");
					}
					else
					{
						$this->info("Fields for this identifier is not empty, add -f flag to force load fields");
					}
				}
				else
				{
					$this->info("Model does not exist: " . $model);
				}
			}
			else
			{
				$this->info("Model does not exist: " . $model);
			}
		}
		else
		{
			$this->info('Identifier does not exist: ' . $identifier);
		}
	}

	protected function getFields($model)
	{
		$field_list = [];

		$empty_stub = file_get_contents(__DIR__ . './../stubs/empty.stub');

		$all_fields = $empty_stub;

		$model_class = new $model;

		$table = $model_class->getTable();

		$fields = Schema::getColumnListing($table);

		foreach ($fields as $field)
		{

			$field_type = Schema::getColumnType($table, $field);

			if (in_array($field_type, $this->integers, true))
			{
				$field_type = "int";
			}
			elseif (in_array($field_type, $this->strings, true))
			{
				$field_type = "string";
			}
			elseif (in_array($field_type, $this->texts, true))
			{
				$field_type = "text";
			}
			elseif (in_array($field_type, $this->dates, true))
			{
				$field_type = 'date';
			}
			else
			{
				$field_type = 'undefined';
			}

			$stub = file_get_contents(__DIR__ . './../stubs/' . $field_type . '.stub');
			$stub = str_replace('{{field_key}}', $field, $stub);
			$all_fields = str_replace('{{replace}}', $stub . $empty_stub, $all_fields);
		}

		$all_fields = str_replace('{{replace}}', '', $all_fields);

		$stub = file_get_contents(__DIR__ . './../stubs/fields.stub');
		$stub = str_replace('{{replace}}', $all_fields, $stub);

		return $stub;
	}
}
