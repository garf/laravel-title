<?php

namespace Garf\LaravelTitle;

use Illuminate\Support\Facades\Facade;

class TitleFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Title';
    }
}
