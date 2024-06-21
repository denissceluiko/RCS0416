<?php

function view($name, $arguments = [])
{
    $name = str_replace('.', '/', $name);

    $path = __DIR__ . '/Views/' . $name . '.php';
    
    extract($arguments);
    require $path;
}

function redirect($to)
{
    header('Location: '.$to);
}

function request($param)
{
    return $_REQUEST[$param] ?? null;
}

?>