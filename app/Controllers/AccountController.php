<?php

namespace App\Controllers;

use App\Models\User;
use Exception;
use Psr\Http\Message\ServerRequestInterface;

class AccountController extends Controller
{
    private string $category;
    private string $message;
    private bool $isSuccess = false;

    public function show()
    {
        if ($this->isAuth()) {
            $params = ['user' => $this->toVue($_SESSION['auth'])];

            if (isset($_SESSION['account'])) {
                $params = array_merge($params, $_SESSION['account']);
            }

            return $this->render('pages/account', $params);
        }

        return $this->redirect('/login');
    }

    public function updateGeneral(ServerRequestInterface $request)
    {
        if ($this->isAuth()) {
            $this->category = 'general';
            $data = $this->getBody($request);

            foreach ($data as $col => $field) {
                if ($field === '') {
                    unset($data[$col]);
                }
            }

            try {
                (new User)->where(['id', $_SESSION['auth']['id']])->update($data);

                $this->message = 'Le compte à bien été mis à jour 🤘';
                $this->isSuccess = true;
            } catch (Exception $e) {
                $this->message = 'Oops, une erreur est survenue 💥';
            }

            return $this->redirect('/account', $this->generateParams());
        }

        return $this->redirect('/login');
    }

    public function updatePassword(ServerRequestInterface $request)
    {
        if ($this->isAuth()) {
            $this->category = 'password';
            $data = $this->getBody($request);

            $user = new User();
            $user->where(['id', $_SESSION['auth']['id']])->first();

            if (
                $data['password'] === $data['password_confirmation']
                && password_verify($data['password_current'], $user->password)
            ) {
                try {
                    (new User)->where(['id', $_SESSION['auth']['id']])->update([
                        'password' => password_hash($data['password'], PASSWORD_BCRYPT)
                    ]);

                    $this->message = 'Le mot de passe à bien été mise à jour 🤘';
                    $this->isSuccess = true;
                } catch (Exception $e) {
                    $this->message = 'Oops, une erreur est survenue 💥. Est-ce que les deux mots de passes sont identiques ? 🤔';
                }

                return $this->redirect('/account', $this->generateParams());
            }

            $this->message = 'Oops, une erreur est survenue 💥. Est-ce que les deux mots de passes sont identiques ? 🤔';
            return $this->redirect('/account', $this->generateParams());
        }

        return $this->redirect('/login');
    }

    public function updateBio(ServerRequestInterface $request)
    {
        if ($this->isAuth()) {
            $this->category = 'bio';
            $data = $this->getBody($request);

            try {
                (new User)->where(['id', $_SESSION['auth']['id']])->update($data);

                $this->message = 'La biographie à bien été mise à jour 🤘';
                $this->isSuccess = true;
            } catch (Exception $e) {
                $this->messagemessage = 'Oops, une erreur est survenue 💥';
            }

            return $this->redirect('/account', $this->generateParams());
        }

        return $this->redirect('/login');
    }

    private function generateParams()
    {
        return [
            'account' => [
                'user' => $this->toVue($_SESSION['auth']),
                'category' => $this->category,
                'message' => $this->message,
                'is_success' => $this->isSuccess
            ]
        ];
    }
}
