<?php

namespace App\Controllers;

use App\Models\User;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ServerRequestInterface;

class AuthController extends Controller
{
    public function login()
    {
        return $this->redirect('/register');
    }

    public function showLoginForm(): Response
    {
        return $this->render('pages/auth/login');
    }

    public function register(ServerRequestInterface $request)
    {
        $user = new User;
        $user->create($this->getBody($request));

        return $this->redirect('/register');
    }

    public function showRegisterForm()
    {
        return $this->render('pages/auth/register');
    }

    public function logout()
    {
    }
}
