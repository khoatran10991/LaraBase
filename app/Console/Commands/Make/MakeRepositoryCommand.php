<?php

namespace App\Console\Commands\Make;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Str;

class MakeRepositoryCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name : The repository class that you want to create}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * @var string
     */
    protected $type = 'Repository';

    /**
     * Execute the console command.
     *
     * @return bool|null
     *
     * @throws FileNotFoundException
     */
    public function handle(): ?bool
    {
        $this->createInterface();
        parent::handle();
        return true;
    }
    /**
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Repositories';
    }

    /**
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ .'/../stubs/repository.stub';
    }

    /**
     * Create a controller for the model.
     *
     * @return void
     */
    protected function createInterface()
    {
        $interface = Str::studly(Str::replaceFirst('Repository','',$this->argument('name')));


        $this->call('make:interface', [
            'name' => "{$interface}Interface",
        ]);
    }
}
