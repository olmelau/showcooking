<?php

require_once CLASSES_PATH . 'VisitanteRegistrado.php';
require_once CLASSES_PATH . 'Admin.php';
require_once CLASSES_PATH . 'Cocinero.php';

session_start();

class VisitanteController
{

    public function comprobarUsuario()
    {

        $visitante = $_SESSION['usuario'];
        $id_rol = $visitante->getIdRol();
        // var_dump($id_rol);

        if ($id_rol != 3) {
            session_destroy();
            header('Location:/desarrollo_servidor/Showcooking/public/index.php');
            exit();
        }
    }

    public function imprimirPanel()
    {

        $visitante = $_SESSION['usuario'];
        $this->comprobarUsuario();
        $visitante->verPanel();


    }

    public function valorarShowcooking()
    {


        $this->comprobarUsuario();

        $titulo = $_POST['titulo'];
        $valoracion = $_POST['valoracion'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($titulo) && isset($valoracion)) {
            $visitante = $_SESSION['usuario'];
            $id_usuario = $visitante->getIdusuario();
            $visitante->puntuarShowcooking($titulo, $valoracion, $id_usuario);
        } else {
            echo "inserte los datos";
        }
    }
}



?>