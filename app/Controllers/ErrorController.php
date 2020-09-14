<?php

namespace App\Controllers;

class ErrorController extends Controller
{
    public function notFound()
    {
        return $this->render('errors/404');
    }
}
