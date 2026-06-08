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

    public function cambiarEstadoShowcooking($id_usuario, $titulo, $publicado){

        $model = new UserModel();
        $cambiarEstadoOk = $model->cambiarEstadoshowcooking($id_usuario, $titulo, $publicado);
    
        if ($cambiarEstadoOk) {
            return true;   
        } else {
            return false;
        }
    
    }

    public function verShowcookingPropios($id_usuario){
        
        $model = new UserModel();
        $showcooking = $model->getShowcookingPropio($id_usuario);

        return $showcooking;
    }


    public function insertarShowcookingNuevo($titulo, $desc, $url_youtube, $foto_url, $chefs, $categoria, $id_propietario){

        $modelo = new UserModel();
        
        $showcookingOK = $modelo->insertarShowcookingNuevo($titulo, $desc, $url_youtube, $foto_url, $chefs, $categoria, $id_propietario);

        if ($showcookingOK) {
            return true;   
        } else {
            return false;
        }
    }

    public function actualizarShowcookingPropio($id_usuario, $titulo, $titulo_nuevo, $descripcion_nueva, $url_youtube_nueva, $foto_url_nueva, $chefs_nuevos, $categoria_nueva){

        $modelo = new UserModel();
        
        $actualizarShowcookingOK = $modelo->actualizarShowcooking($id_usuario, $titulo, $titulo_nuevo, $descripcion_nueva, $url_youtube_nueva, $foto_url_nueva, $chefs_nuevos, $categoria_nueva);

        if ($actualizarShowcookingOK) {
            return true;   
        } else {
            return false;
        }
    }







    }





?>