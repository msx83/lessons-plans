<?php

class Bootstrap
{
    function __construct()
    {
        $get_url = filter_input(INPUT_GET, 'url') ?? null;
        $trim_url = rtrim($get_url, '/');
        $url = explode('/', $trim_url);
        
        $controller = new Controller;

        if (empty($url[0])) {
            $controller->index();
            exit();
        }

        if (isset($url[2])) {
            if (method_exists($controller, $url[0])) {
                $controller->{$url[0]}($url[1], $url[2]);
            } else {
                $controller->error();
            }
        } else if (isset($url[1])) {
            if (method_exists($controller, $url[0])) {
                $controller->{$url[0]}($url[1]);
            } else {
                $controller->error();
            }
        } else if (isset($url[0])) {
            if (method_exists($controller, $url[0])) {
                $controller->{$url[0]}();
            } else {
                $controller->error();
            }
        }
    }

}
