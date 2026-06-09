<?php

session_start();

require_once(MODEL_PATH . 'loginModel.php');

class LoginController
{

    public function verLogin()
    {
        require_once VIEW_PATH . 'loginView.php';
    }

    public function registrarse()
    {

        $username_registro = $_POST['username_registro'];
        $contrasena_registro = $_POST['contrasena_registro'];
        $email_registro = $_POST['email_registro'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($username_registro) && isset($contrasena_registro) && isset($email_registro)) {

            $loginModel = new LoginModel();
            $datosOK = $loginModel->comprobarExiste($username_registro, $email_registro);

            if (empty($datosOK)) {

                $insertOK = $loginModel->registrarse($username_registro, $contrasena_registro, $email_registro);

                if ($insertOK) {

                    $datos_usuario = $loginModel->comprobarUsuario($username_registro, $contrasena_registro);

                    $id_usuario = $datos_usuario['id_usuario'];
                    $username = $datos_usuario['username'];
                    $contrasena = $datos_usuario['contrasena'];
                    $email = $datos_usuario['email'];
                    $id_rol = $datos_usuario['id_rol'];

                    if ($datos_usuario != false) {


                        $this->comprobarRol($id_usuario, $username, $contrasena, $email, $id_rol);

                    } else {

                        require_once VIEW_PATH . 'errorView.php';
                    }

                } else {
                    echo 'Error';
                }

            } else {

                echo 'Error, ya existe el usuario';
                header('Location:/desarrollo_servidor/Showcooking/public/index.php/login/verLogin');
                exit();
            }
        }
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
                session_start();
                $admin = new Admin($id_usuario, $username, $contrasena, $email, $id_rol);
                $_SESSION['usuario'] = $admin;
                // var_dump($admin);
                header('Location:/desarrollo_servidor/Showcooking/public/index.php/admin/imprimirPanel');
                // $admin->verPanel();
                break;

            case 2:
                require_once CLASSES_PATH . 'Cocinero.php';
                session_start();
                $cocinero = new Cocinero($id_usuario, $username, $contrasena, $email, $id_rol);
                $_SESSION['usuario'] = $cocinero;
                header('Location:/desarrollo_servidor/Showcooking/public/index.php/cocinero/imprimirPanel');
                // $cocinero->verPanel();
                break;

            case 3:
                require_once CLASSES_PATH . 'VisitanteRegistrado.php';
                session_start();
                $visitante = new VisitanteRegistrado($id_usuario, $username, $contrasena, $email, $id_rol);
                $_SESSION['usuario'] = $visitante;
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