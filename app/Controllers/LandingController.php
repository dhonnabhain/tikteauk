<?php

namespace App\Controllers;

class LandingController extends Controller
{
    public function landing()
    {
        return $this->render('pages/landing');
    }
}
