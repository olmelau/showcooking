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

        $cocinero = $_SESSION['usuario'];
        $this->comprobarUsuario();
        $cocinero->verPanel();


    }

    public function verShowcookingPropios()
    {

        $cocinero = $_SESSION['usuario'];
        $this->comprobarUsuario();
        $id_usuario = $cocinero->getIdusuario();
        $showcooking = $cocinero->verShowcookingPropios($id_usuario);

        $this->imprimirShowcooking($showcooking);

    }


    public function imprimirShowcooking($showcookings)
    {


        $this->comprobarUsuario();
        // var_dump($showcooking)
        if (empty($showcookings)) {
            echo "<p>No hay showcookings para mostrar.</p>";
            echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/cocinero/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";
            return;
        } else {

            echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/cocinero/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";

            foreach ($showcookings as $showcooking) {
                echo "<div>";
                echo "<h1>" . $showcooking['titulo'] . "</h1>";
                echo "<iframe src='" . $showcooking['url_youtube'] . "' 
                width='560' height='315' 
                frameborder='0'>
                </iframe>";
                //  echo "<a href='" . htmlspecialchars($showcooking['url_youtube']) . "' target='_blank'>Ver video en YouTube</a>";
                echo "</div>";
            }

        }
    }

    public function insertarShowcookingNuevo()
    {


        $titulo = $_POST['titulo'];
        $desc = $_POST['descripcion'];
        $url_youtube = $_POST['url_youtube'];
        $foto_url = $_POST['foto_url'];
        $chefs = $_POST['chefs'];
        $categoria = $_POST['categoria'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($titulo) && isset($desc) && isset($url_youtube) && isset($foto_url) && isset($chefs) && isset($categoria)) {
           
            $cocinero = $_SESSION['usuario'];
            $this->comprobarUsuario();
            $id_propietario = $cocinero->getIdusuario();
    
            $nuevoShowcooking = $cocinero->insertarShowcookingNuevo($titulo, $desc, $url_youtube, $foto_url, $chefs, $categoria, $id_propietario);

            if ($nuevoShowcooking) {
                echo 'Showcooking insertado correctamente';
                 echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/visitante/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";
            } else{
                echo 'No se ha podido insertar';
                 echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/visitante/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";
            }
        } else {
            echo 'Completa todos los campos';
        }




    }

    //--------------------------------- CERRAR SESION ----------------------------

    public function cerrarSesion()
    {
        Usuario::cerrarSesion();

    }

}

?>