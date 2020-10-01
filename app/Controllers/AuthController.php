<?php

namespace App\Controllers;

use App\Models\User;
use Laminas\Diactoros\Response;
use PDOException;
use Psr\Http\Message\ServerRequestInterface;

class AuthController extends Controller
{
    public function login(ServerRequestInterface $request)
    {
        $data = $this->getBody($request);

        $user = new User();
        $user->where(['email', $data['email']])->first();

        if (property_exists($user, 'password') && password_verify($data['password'], $user->password)) {
            $_SESSION['auth'] = get_object_vars($user);

            return $this->redirect('pages/home');
        }

        return $this->render('pages/auth/login', ['message' => 'Hum, aucun compte trouvé pour ces identifiants 😕']);
    }

    public function showLoginForm(): Response
    {
        return $this->render('pages/auth/login');
    }

    public function register(ServerRequestInterface $request)
    {
        $data = $this->getBody($request);

        if ($data['password'] === $data['password_confirmation']) {
            unset($data['password_confirmation']);

            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

            $user = new User;
            if ($user->create($data) instanceof PDOException) {
                return $this->render('pages/auth/register', ['message' => "Ce nom d'utilisateur / email est déjà pris, retente ta chance 🤔"]);
            }
        }

        return $this->redirect('/');
    }

    public function showRegisterForm()
    {
        return $this->render('pages/auth/register');
    }

    public function logout()
    {
    }
}
