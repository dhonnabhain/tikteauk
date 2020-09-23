<?php

namespace App\Controllers;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ServerRequestInterface;

class AuthController extends Controller
{
    public function login()
    {
    }

    public function showLoginForm(): Response
    {
        return $this->render('pages/login');
    }

    public function register(ServerRequestInterface $request)
    {
        dump($request);   
        return $this->redirect('/register');
    }

    public function showRegisterForm()
    {
        return $this->render('pages/register');
    }

    public function logout()
    {
    }
}
