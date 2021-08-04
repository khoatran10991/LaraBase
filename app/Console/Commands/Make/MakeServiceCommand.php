<?php

namespace App\Console\Commands\Make;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Str;

class MakeServiceCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name : The service class that you want to create}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * @var string
     */
    protected $type = 'Service';

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
        return $rootNamespace . '\Services';
    }

    /**
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__.'/../stubs/Services/service.stub';
    }

    /**
     * Replace the namespace for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return $this
     */
    protected function replaceNamespace(&$stub, $name)
    {
        parent::replaceNamespace($stub, $name);

        $classNameService = $this->getNameService();

        $stub = str_replace(['DummyImpl', '{{ ImplInterface }}', '{{ImplInterface}}'], $classNameService, $stub);
        $stub = str_replace(['dummyImpl', '{{ impl }}', '{{impl}}'], lcfirst($classNameService), $stub);

        return $this;
    }

    /**
     * Create a controller for the model.
     *
     * @return void
     */
    protected function createInterface()
    {
        $classNameService = $this->argument('name');


        $this->call('make:service_interface', [
            'name' => "{$classNameService}Interface",
        ]);
    }

    /**
     * @return string
     */
    private function getNameService(): string
    {
        return Str::studly(Str::replaceFirst('Service','',$this->argument('name')));
    }
}
