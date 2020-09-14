<?php

if (!function_exists('app')) {
    function app()
    {
        return [
            'env' => $_ENV,
            'session' => $_SESSION,
            'get' => $_GET,
            'post' => $_POST
        ];
    }
}
