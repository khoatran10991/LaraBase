<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //set Log Query SQL
        if (config('env.APP_DEBUG') && config('env.APP_ENV') !== 'production') {
            DB::listen(function ($query) {
                $request = app('request');
                $sql = str_replace_array('?',$query->bindings,$query->sql);
                Log::stack(['query'])->info('[QueryLog] '.$sql, [
                    'requestUri' => $request->path(),
                    'Time'       => $query->time,
                ]);
            });
        }
    }
}
