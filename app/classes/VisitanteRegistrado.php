<?php

require_once 'Usuario.php';
require_once MODEL_PATH . 'userModel.php';

class VisitanteRegistrado extends Usuario
{

    private $listaFavoritos = [];

    public function verPanel()
    {
        require_once VIEW_PATH . 'visitanteView.php';
    }

    public function puntuarShowcooking($titulo, $valoracion, $id_usuario)
    {

        $modelo = new UserModel();
        $puntuacion = $modelo->valorarShowcooking($titulo, $valoracion, $id_usuario);

        if ($puntuacion) {
            echo "Valoración realizada.";
            echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/visitante/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";
        } else {
            echo "no se ha realizado la valoración.";
            echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/visitante/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";
        }

    }

    public function comentar()
    {

    }

    public function anadirFavorito()
    {
        //se añadira el favorito al array $listaFavoritos
    }


}



?>