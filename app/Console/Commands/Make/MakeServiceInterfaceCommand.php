<?php

namespace App\Console\Commands\Make;

use Illuminate\Console\GeneratorCommand;

class MakeServiceInterfaceCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service_interface {name : The interface implement service that you want to create}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create interface implement service';

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
        return $rootNamespace . '\Services\Interfaces';
    }

    /**
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__.'/../stubs/Services/interface.stub';
    }
}
