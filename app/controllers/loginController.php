<?php

                
require_once (MODEL_PATH.'loginModel.php');

class LoginController
{

    public function comprobarRol($rol)
    {
    
        switch ($rol) {
            case 'admin':
                require_once (VIEW_PATH.'adminView.php');
                 
                break;
            case 'cocinero':
                echo '<p>dashboardController works porque soy COCINERO!</p>';
                break;
            case 'visitante':
                 echo '<p>dashboardController works porque soy VISITANTE!</p>';
                break;
            
            default:
                echo 'default';
                break;
        }

    }

    public function comprobarUsuarioExiste(){

    session_start();

     if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

        header('Location: index.php');
        exit();                

     } 


        $username = $_POST['username'];
        $contrasena = $_POST['contrasena'];

        $loginModel = new LoginModel();

        
        $datos_usuario = $loginModel->comprobarUsuario($username, $contrasena);
        
        
        if($datos_usuario != false){

            $_SESSION ['username'] = $username;
            $_SESSION['contrasena'] = $contrasena;
            $_SESSION['id_usuario'] = $datos_usuario['id_usuario'];
            $_SESSION['id_rol'] = $datos_usuario['id_rol'];
            $_SESSION['nombre_rol'] = $datos_usuario['nombre_rol'];

            $this->comprobarRol($datos_usuario['nombre_rol']);

     } else{
        require_once '../views/errorView.php';
        echo 'no estoy encontrando al usuario';
     }




    }


    public function verLogin(){
        require_once ('../app/views/loginView.php');
    }

}






?>