<?php

                
require_once (MODEL_PATH.'loginModel.php');

class LoginController
{

    public function verLogin(){

        require_once VIEW_PATH.'loginView.php';

    }

    public function comprobarRol($rol)
    {
    
        switch ($rol) {
            case 'admin':
                
                $admin = new Admin();
                 
                break;
            case 'cocinero':
              
                $cocinero = new Cocinero();
                break;
            case 'visitante':
                
                $visitante = new VisitanteRegistrado();
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

            // $_SESSION [$admin];

            $this->comprobarRol($datos_usuario['nombre_rol']);

     } else{
        require_once '../views/errorView.php';
        echo 'no estoy encontrando al usuario';
     }

    }
}

?>