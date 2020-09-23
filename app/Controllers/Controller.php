<?php

namespace App\Controllers;

use Laminas\Diactoros\Response;

class Controller
{
    protected $rendered;

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

    public function json($result): Response
    {
        return $this->response(json_encode($result));
    }

    public function redirect(string $url)
    {
        return new \Laminas\Diactoros\Response\RedirectResponse($url);
    }

    private function response(string $rendered): Response
    {
        $response = new \Laminas\Diactoros\Response;
        $response->getBody()->write($rendered);

        return $response;
    }
}
