<?php

namespace App\Core;

use App\Controllers\ArticleController;
use App\Controllers\ImageController;
use App\Controllers\LandingController;

class Request
{
    public function __construct()
    {

    }

    public function handle()
    {
        $this->route();
    }

    public function route()
    {
        $routes = [
            'get' => [
                '/' => [LandingController::class, 'landing'],
                'article' => [ArticleController::class, 'index'],
                'article/edit' => [ArticleController::class, 'edit'],
                'image' => [ImageController::class, 'index'],
            ],
            'post' => [
                'article' => [ArticleController::class, 'store'],
                'article/store' => [ArticleController::class, 'store'],
                'article/update' => [ArticleController::class, 'update'],
                'article/delete' => [ArticleController::class, 'delete'],
                'image/store' => [ImageController::class, 'store'],
            ],
        ];

        $arr = explode('?', ltrim($_SERVER['REQUEST_URI'], '/'));
        
        $requestUri = $arr[0];
        $params = !empty($arr[1]) ? $arr[1] : null;

        
        if (strlen($requestUri) === 0) {
            $requestUri = '/';
        }

        if (array_key_exists($requestUri, $routes[$this->method()])) {
            $controller = new $routes[$this->method()][$requestUri][0];
            
            $controller->{$routes[$this->method()][$requestUri][1]}();
        } else {
            view('layouts.404', compact('requestUri', 'params'));
        }
    }

    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}