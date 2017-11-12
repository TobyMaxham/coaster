<?php

namespace TobyMaxham\Coaster\Providers;

use CoasterCms\Helpers\Cms\Install;
use Illuminate\Support\ServiceProvider;

/**
 * Class CoasterRoutesProvider
 * @package TobyMaxham\Coaster\Providers
 * @author Tobias Maxham <git2017@maxham.de>
 */
class CoasterRoutesProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mapRoutes();
    }

    private function mapRoutes()
    {
        $namespace = '\\TobyMaxham\\Coaster\\Http\\Controllers';
        $routeName = 'coaster.';
        $routesDir = realpath(__DIR__ . '/../../routes/web');
        $adminRouteName = $routeName . 'admin.';
        $adminUrl = config('coaster::admin.url') . '/';



        if (!Install::isComplete()) {
            Route::middleware(['web'])
                ->as($routeName . 'install.')
                ->namespace($namespace)
                ->group($routesDir . '/install.php');
        }

        if (\App::runningInConsole() || \Request::segment(1) == rtrim($adminUrl, '/') || config('coaster::admin.always_load_routes')) {
            \Route::middleware(['web'])
                ->prefix($adminUrl)
                ->as($adminRouteName)
                ->namespace($namespace . '\\AdminControllers')
                ->group($routesDir . '/admin-auth.php');
        }

        \Route::middleware(['web', 'coaster.guest'])
            ->prefix($adminUrl)
            ->as($adminRouteName)
            ->namespace($namespace . '\AdminControllers')
            ->group($routesDir . '/admin-guest.php');

        \Route::middleware(['web', 'coaster.admin'])
            ->prefix($adminUrl)
            ->as(rtrim($adminRouteName, '.'))
            ->namespace($namespace)
            ->group($routesDir . '/admin.php');

        \Route::middleware(['web'])
            ->namespace($namespace)
            ->group($routesDir . '/cms.php');
    }
}
