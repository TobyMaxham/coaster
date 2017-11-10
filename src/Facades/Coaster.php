<?php
/**
 * Created by PhpStorm.
 * User: tmaxham
 * Date: 24.08.17
 * Time: 23:34
 */

namespace TobyMaxham\Coaster\Facades;


use Illuminate\Support\Facades\Facade;

/***
 * Class Coaster
 * @package TobyMaxham\Coaster\Facades
 * @author Tobias Maxham <git2017@maxham.de>
 */
class Coaster extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'tm.coasterblock';
    }
}
