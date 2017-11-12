<?php


if (!function_exists('coaster_path')) {

    /**
     * @param string $path
     * @return string
     */
    function coaster_path($path = '')
    {
        $ds = DIRECTORY_SEPARATOR;
        $coasterPackage = $ds . 'vendor' . $ds . 'web-feet' . $ds . 'coasterframework';
        return app()->basePath() . $coasterPackage .($path ? $ds . $path : $path);
    }
}

if (!function_exists('coaster_src')) {

    /**
     * @param string $path
     * @return string
     */
    function coaster_src($path = '')
    {
        return coaster_path('src') .($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}
