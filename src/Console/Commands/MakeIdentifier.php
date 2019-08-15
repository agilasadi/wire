<?php

namespace rapkit\wire\Console\Commands;

use Illuminate\Console\Command;

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
        $this->info('Discovering the model: ' . $model = config('wire.model_path') . $this->argument('name'));

        if (class_exists($model)) {
            $this->info("Model exists, Creating Identifier and binding Model..");
            $fields = $this->getFields($model);
        } else {
            $this->info("Model does not exist, Creating Identifier");
            $fields = null;
        }

        $stub = $this->getStub($this->argument('name'));

        $path = app_path("Wire/Identifiers/" . $this->argument('name') . ".php");

        file_put_contents($path, $stub);

        $this->info("Identifier was created. don't forget to modify fields for convinient output");
    }

    protected function getStub($className)
    {
        $stub = file_get_contents(__DIR__ . './../stubs/identifier.stub');

        $stub = str_replace('{{name}}', $className, $stub);

        return $stub;
    }

    protected function getFields($model)
    {
        return [];
    }
}
