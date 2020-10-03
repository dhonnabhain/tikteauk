<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function show()
    {
        if ($this->isAuth()) {
            return $this->render('pages/home', ['user' => $this->toVue($_SESSION['auth'])]);
        }

        return $this->redirect('/login');
    }
}
