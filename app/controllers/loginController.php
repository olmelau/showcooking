<?php


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
        session_start();
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
            
            $usuario = new Usuario($id_usuario, $username, $contrasena, $email, $id_rol);
            $this->comprobarRol($usuario);
       
            } else {

            require_once VIEW_PATH . 'errorView.php';
        }

    }



    //en el metodo comprobarRol->pasar al usuario y dependiendo del rol instanciar al hijo

    public function comprobarRol($usuario)
    {

        switch ($usuario->id_rol) {

            case 1:

                $admin = new Admin();
                //llamar a la vista del admin


                break;
            case 2:
                $cocinero = new Cocinero();
  
                break;
  
                case 3:
                $visitante = new VisitanteRegistrado();
                break;

            default:
                echo 'default';
                break;
        }

    }
}

?>