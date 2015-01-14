<?php

require './Controller/Controller.php';
require 'Route.php';

class Init
{
    /**
     * @return void
     */
    public function start()
    {
        Route::dispatch('', '');
    }
}
