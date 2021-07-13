<?php

namespace App\Console\Commands\Make;

use Illuminate\Console\GeneratorCommand;

class MakeRepositoryInterfaceCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:interface {name : The interface implement repository that you want to create}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create interface implement repository';

    /**
     * @var string
     */
    protected $type = 'Interface';

    /**
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Repositories\Interfaces';
    }

    /**
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ .'/../stubs/interface.stub';
    }
}
