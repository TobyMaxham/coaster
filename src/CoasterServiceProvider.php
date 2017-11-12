<?php

namespace TobyMaxham\Coaster;

use Illuminate\Support\ServiceProvider;
use TobyMaxham\Coaster\Providers\CoasterRoutesProvider;

/**
 * Class CoasterServiceProvider
 * @package TobyMaxham\Coaster
 * @author Tobias Maxham <git2017@maxham.de>
 */
class CoasterServiceProvider extends ServiceProvider
{

    public function boot()
    {
        //

    }

    public function register()
    {
        $this->app->register(CoasterRoutesProvider::class);
        $this->bindClasses();
    }

    private function bindClasses()
    {

        $this->app->bind('tm.coasterblock', function($app) {
            return new CoasterBlockHelper();
        });


    }


}
