<?php

//hacemos un require de las rutas
require_once 'routes.php';

// INDEX - API REST
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');
$partes = explode('/', $uri);

// var_dump($uri);
// var_dump($partes);

$controllerUri = $partes[3] ?? "login"; //la parte de la uri que es el controlador -> api o home o cualquier otro controller que vaya a implementar
$action = $partes[4] ?? "verLogin";  //accion o metodo que tiene que estar dentro del controlador
$class = $controllerUri . "Controller";

$rutaClass = CONTROLLER_PATH.$class.'.php';

//var_dump($rutaClass);

if (file_exists($rutaClass)) {

    require $rutaClass;

    $controller = new $class(); //dinamico

    if ($action != null && method_exists($controller, $action)) {

        $controller->$action();

    } else {
        
        echo "Error: no existe el metodo";
    }

} else {
    echo "No existe la clase";
}


