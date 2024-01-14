<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        View::composer('Web::*', 'App\Http\View\Composers\CategoryComposer');
        View::composer('Web::*', 'App\Http\View\Composers\WebMenuComposer');
    }



    public function register(){
        //
    }


}