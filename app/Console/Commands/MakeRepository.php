<?php

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;

class MakeRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

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
        $className = $this->argument('name');
        $path = app_path('Repositories/' . $className . '.php');
        $stub = File::get(__DIR__ . '/stubs/Repository.stub');
        $contents = str_replace('DummyClass', $className, $stub);

        File::put($path, $contents);

        $this->info('Repository created successfully.');
    }
}
