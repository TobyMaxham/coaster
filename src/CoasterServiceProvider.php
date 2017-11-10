<?php
/**
 * Created by PhpStorm.
 * User: tmaxham
 * Date: 24.08.17
 * Time: 23:32
 */

namespace TobyMaxham\Coaster;


use Illuminate\Support\ServiceProvider;

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
        $this->bindClasses();
    }

    private function bindClasses()
    {

        $this->app->bind('tm.coasterblock', function($app) {
            return new CoasterBlockHelper();
        });


    }

}
