<?php

require_once CLASSES_PATH . 'Usuario.php';
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

    public function verShowcooking()
    {

        $visitante = $_SESSION['usuario'];
        $this->comprobarUsuario();

        $showcookings = $visitante->verShowcooking();

        $this->imprimirShowcooking($showcookings);

    }

    public function imprimirShowcooking($showcookings)
    {

        $this->comprobarUsuario();

        if (empty($showcookings)) {
            echo "<p>No hay showcookings para mostrar.</p>";
            echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/visitante/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";
            return;
        } else{

        echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/visitante/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";

            foreach ($showcookings as $showcooking) {
                echo "<div>";
                echo "<h1>".$showcooking['titulo']."</h1>";
                echo "<iframe src='" . $showcooking['url_youtube'] . "' 
                width='560' height='315' 
                frameborder='0'>
                </iframe>";
                //  echo "<a href='" . htmlspecialchars($showcooking['url_youtube']) . "' target='_blank'>Ver video en YouTube</a>";
                echo "</div>";
            }

        }


    }


    public function insertarFavorito(){
        
        $visitante = $_SESSION['usuario'];
        $this->comprobarUsuario();
        $id_usuario = $visitante->getIdusuario();


        $titulo = $_POST['titulo'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($titulo)) {

            $exito = $visitante->insertarFavorito($id_usuario, $titulo);

            if ($exito) {
            echo "Favorito Guardado.";
            echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/visitante/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";
        } else {
            echo "no se ha añadido a favoritos.";
            echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/visitante/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";
        }

        }
    }

    public function verFavoritos(){

        $visitante = $_SESSION['usuario'];
        $this->comprobarUsuario();

        $id_usuario = $visitante->getIdusuario();
        $favoritos = $visitante->traerFavoritos($id_usuario);

        $this->imprimirFavoritos($favoritos);


    }

    public function imprimirFavoritos($favoritos){
        $this->comprobarUsuario();

        if (empty($favoritos)) {
            echo "<p>No hay favoritos para mostrar.</p>";
            echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/visitante/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";
            return;

        } else{

        echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/visitante/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";

            echo "<h3>Lista de Favoritos</h3>";
            foreach ($favoritos as $favorito) {
                echo "<p>".$favorito['titulo']."</p>";
            }

        }
    }


    public function comentarShowcooking(){

       
        $titulo = $_POST['titulo'];
        $comentario = $_POST['comentario'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($titulo) && isset($comentario)) {
            $visitante = $_SESSION['usuario'];
            $id_usuario = $visitante->getIdusuario();
            $visitante->comentarShowcooking($titulo, $comentario, $id_usuario);
        } else {
            echo "inserte los datos";
        }
    }

    //--------------------------------- CERRAR SESION ----------------------------

    public function cerrarSesion()
    {

        Usuario::cerrarSesion();

    }

}



?>