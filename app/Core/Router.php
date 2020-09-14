<?php

namespace App\Core;

use App\Controllers\ErrorController;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Route\Http\Exception;
use League\Route\Router as LeagueRouter;

class Router
{
    public function __construct()
    {
        $this->grabRequest()
            ->bootRouter()
            ->loadRoutes()
            ->generateResponse();
    }

    private function grabRequest(): self
    {
        $this->request = ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
        );

        return $this;
    }

    private function bootRouter(): self
    {
        $this->router = new LeagueRouter;

        return $this;
    }

    private function loadRoutes(): self
    {
        $routes = array_merge(
            require_once(__DIR__ . '/../Core/Routes.php'),
            $this->errorRoutes()
        );

        foreach ($routes as $route) {
            $this->router->{$route['verb']}($route['path'], $route['controller'] . '::' . $route['method']);
        }

        return $this;
    }

    private function generateResponse(): void
    {
        try {
            $response = $this->router->dispatch($this->request);

            (new SapiEmitter)->emit($response);
        } catch (Exception $e) {
            header('Location: /' . $e->getStatusCode());
            exit;
        }
    }

    private function errorRoutes(): array
    {
        return [
            [
                'verb' => 'get',
                'path' => '/404',
                'controller' => ErrorController::class,
                'method' => 'notFound',
            ]
        ];
    }
}
