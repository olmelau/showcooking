<?php

require_once CLASSES_PATH . 'Usuario.php';
require_once CLASSES_PATH . 'VisitanteRegistrado.php';
require_once CLASSES_PATH . 'Admin.php';
require_once CLASSES_PATH . 'Cocinero.php';

session_start();

class CocineroController
{

    public function comprobarUsuario()
    {

        $cocinero = $_SESSION['usuario'];
        $id_rol = $cocinero->getIdRol();
        // var_dump($id_rol);

        if ($id_rol != 2) {
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

    //--------------------------------- CERRAR SESION ----------------------------

    public function cerrarSesion()
    {
        Usuario::cerrarSesion();

    }

}

?>