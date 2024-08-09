<?php

namespace App\Middleware;

use App\Application\Middleware\Middleware;
use App\Application\Router\Redirect;

class PaginationMiddleware extends Middleware
{
    public function handle()
    {
        if (str_replace("/home/", "", $_SERVER['REQUEST_URI']) < 1) {
            Redirect::to("/home/1");
            die();
        }
    }
}
