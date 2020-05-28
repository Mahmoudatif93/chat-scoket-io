<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
namespace App\Http\Composers;
use Illuminate\View\View;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       view()->composer('App\Http\Composers\SampleComposer');
    }
    public function compose(View $view)

{

$sample_data=[

'Foo',

'Bar',

'Baz'

];

$view->with('sample_data', $sample_data);

}

}
