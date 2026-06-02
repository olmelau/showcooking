<?php

session_start();

require_once(MODEL_PATH . 'loginModel.php');

class LoginController
{

    public function verLogin()
    {
        require_once VIEW_PATH . 'loginView.php';
    }

    public function loguearse()
    {
        echo "hola loguearse.";
    }


    public function comprobarUsuarioExiste()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php');
            exit();
        }

        $username = $_POST['username'];
        $contrasena = $_POST['contrasena'];

        $loginModel = new LoginModel();

        $datos_usuario = $loginModel->comprobarUsuario($username, $contrasena);

        $id_usuario = $datos_usuario['id_usuario'];
        $username = $datos_usuario['username'];
        $contrasena = $datos_usuario['contrasena'];
        $email = $datos_usuario['email'];
        $id_rol = $datos_usuario['id_rol'];

        if ($datos_usuario != false) {


            // require_once CLASSES_PATH . 'Usuario.php';    
            // $usuario = new Usuario($id_usuario, $username, $contrasena, $email, $id_rol);
            $this->comprobarRol($id_usuario, $username, $contrasena, $email, $id_rol);

        } else {

            require_once VIEW_PATH . 'errorView.php';
        }

    }


    public function comprobarRol($id_usuario, $username, $contrasena, $email, $id_rol)
    {

        switch ($id_rol) {

            case 1:
                require_once CLASSES_PATH . 'Admin.php';
                $admin = new Admin($id_usuario, $username, $contrasena, $email, $id_rol);
                $_SESSION["admin"] = $admin;
                // var_dump($admin);
                header('Location:/desarrollo_servidor/Showcooking/public/index.php/admin/imprimirPanel');
                // $admin->verPanel();
                break;
                
                case 2:
                    require_once CLASSES_PATH . 'Cocinero.php';
                    $cocinero = new Cocinero($id_usuario, $username, $contrasena, $email, $id_rol);
                    $_SESSION["cocinero"] = $cocinero;
                    header('Location:/desarrollo_servidor/Showcooking/public/index.php/cocinero/imprimirPanel');
                    // $cocinero->verPanel();
                    break;
                    
                    case 3:
                        require_once CLASSES_PATH . 'VisitanteRegistrado.php';
                        $visitante = new VisitanteRegistrado($id_usuario, $username, $contrasena, $email, $id_rol);
                        $_SESSION["visitante"] = $visitante;
                        header('Location:/desarrollo_servidor/Showcooking/public/index.php/visitante/imprimirPanel');
                // $visitante->verPanel();
                break;

            default:
                // var_dump($usuario);
                echo 'default';
                break;
        }

    }

}

?>