<?php

namespace App\Controllers;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ServerRequestInterface;

class Controller
{
    protected $rendered;

    public function json($result): Response
    {
        return $this->response(json_encode($result));
    }

    public function redirect(string $url, array $toPutInSession = [])
    {
        foreach ($toPutInSession as $key => $item) {
            $_SESSION[$key] = $item;
        }

        return new \Laminas\Diactoros\Response\RedirectResponse($url);
    }

    protected function isAuth()
    {
        return array_key_exists('auth', $_SESSION);
    }

    protected function redirectIfNotAuth()
    {
        if ($this->isAuth()) {
            return $this->redirect('/login');
        }
    }

    protected function toVue($item): string
    {
        return htmlspecialchars(json_encode($item));
    }

    protected function getBody(ServerRequestInterface $request): ?array
    {
        return $request->getParsedBody();
    }

    protected function render(string $view, $parameters = null): Response
    {
        ob_start();

        global $params;
        $params = $parameters;

        include($_SERVER['DOCUMENT_ROOT'] . "/../app/Views/$view.php");
        $rendered = ob_get_contents();

        ob_end_clean();

        return $this->response($rendered);
    }

    private function response(string $rendered): Response
    {
        $response = new \Laminas\Diactoros\Response;
        $response->getBody()->write($rendered);

        return $response;
    }
}
