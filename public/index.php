<?php

//hacemos un require de las rutas
require_once 'routes.php';

// INDEX - API REST

// $url = $SERVER['REQUEST_URI']; //Esto es la url que va a tener el navegador
 
$metodo = $_SERVER['REQUEST_METHOD'];

//aqui se captura el metodo de la petición

//convertir la ruta a un array con el metodo parse_url -> esto elimina el host (donde se ubica la web)
// $url_array = parse_url($url);
//hacer el trim para eliminar espacios en blanco si hubiera
// $url_array = trim($url_array);

//dividir el array en partes para trabajar con el metodo explode
// $partes = explode('/', $url_array);

//hacemos un switch para diferenciar el tipo de peticion
// GET
// POST

// $metodo = 'GET';
echo $metodo;

if (!isset($_POST['controller']) || !isset($GET['controller'])){

    $metodo = 'home';

}
switch ($metodo) {
    
    case 'GET':

        $controllerName = $_GET['controller'] . 'Controller';
        $actionName = $_GET['action'];
        $controllerFile = CONTROLLER_PATH. $controllerName . '.php';
        $array_datos = []; //aqui almacenaremos el resto de la url a partir del action

        if (file_exists($controllerFile)) {

            require_once $controllerFile;
            $controllerInstance = new $controllerName;

            // $controllerInstance->verDashboard();
            //recogemos todos los datos de la url que venga por GET y luego en el controllador utilizamos la posicion que necesitemos
            $array_datos = $_GET;

            if (count($array_datos) > 2) { //tiene 3 o más parametros en la url 
            //por ejemplo: index.php?controller=dashboard&action=verDashboardRol&rol=admin
                $controllerInstance->$actionName($array_datos);
            } else {
                $controllerInstance->$actionName();
            }
        } else {   
            die("Recurso no encontrado");
        }
        break;
    
    case 'POST':

        $controllerName = $_POST['controller'] . 'Controller';
        $actionName = $_POST['action'];
        $controllerFile = CONTROLLER_PATH . $controllerName . '.php';
        $array_datos = []; //aqui almacenaremos el resto de la url a partir del action

        if (file_exists($controllerFile)) {

            require_once $controllerFile;
            $controllerInstance = new $controllerName;

            // $controllerInstance->verDashboard();
            //recogemos todos los datos de la url que venga por GET y luego en el controllador utilizamos la posicion que necesitemos
            $array_datos = $_POST;

            if (count($array_datos) > 2) { //tiene 3 o más parametros en la url 
            //por ejemplo: index.php?controller=dashboard&action=verDashboardRol&rol=admin
                $controllerInstance->$actionName($array_datos);
            } else {
                $controllerInstance->$actionName();
            }
        } else {   
            die("Recurso no encontrado");
        }
        
        break;


        case 'home':
            echo 'HOME';
            require_once (CONTROLLER_PATH.'loginController.php');
            $controller = new LoginController();
            $controller->verLogin();
            break;

    default:
        
        //esto cuando tengamos el login redirigiremos a la pagina de inicio o de login si no tengo la sesion iniciada.
        require_once (CONTROLLER_PATH.'loginController.php');
        $controller = new LoginController();
        $controller->verLogin();
        break;

}



?>