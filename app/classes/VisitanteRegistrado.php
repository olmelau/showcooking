<?php

require_once 'Usuario.php';
require_once MODEL_PATH . 'userModel.php';

class VisitanteRegistrado extends Usuario
{
  
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

    public function comentarShowcooking($titulo, $comentario, $id_usuario){

        $modelo = new UserModel();
        $comentario = $modelo->insertarComentario($titulo, $comentario, $id_usuario);

          if ($comentario) {
            echo "Comentario publicado.";
            echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/visitante/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";
        } else {
            echo "no se ha publicado el comentario.";
            echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/visitante/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";
        }

    }




    public function insertarFavorito($id_usuario, $titulo)
    {
        $modelo = new UserModel();
        $insertOk = $modelo->insertarFavorito($id_usuario, $titulo);
    
        if ($insertOk) {
            return true;
        }else {
            return false;
        }
    
        }


    public function traerFavoritos($id_usuario){

        $modelo = new UserModel();
        $favoritos = $modelo->getFavoritos($id_usuario);

        return $favoritos;
    }


    public function verShowcooking(){
        
        $modelo = new UserModel();
        $showcookings = $modelo->getShowcooking();

         if ($showcookings) {
           
         return $showcookings;
        
            } else {
            
            echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/visitante/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";
        }
    }


}



?>