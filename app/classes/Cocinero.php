<?php

require_once 'Usuario.php';

    class Cocinero extends Usuario{

    public function verPanel(){
        require_once VIEW_PATH.'cocineroView.php';
    }

    public function darAltaShowcooking(){
    //insertar en la tabla showcooking
    }
    
    public function actualizarShowcooking(){
    //editar showcooking
    }

    public function cambiarVisibilidad(){
    //pasar un video de publico a privado
    }

    public function verShowcookingPropios($id_usuario){
        
        $model = new UserModel();
        $showcooking = $model->getShowcookingPropio($id_usuario);

        return $showcooking;
    }







    }





?>