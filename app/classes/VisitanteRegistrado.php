<?php

require_once 'Usuario.php';

class VisitanteRegistrado extends Usuario{

    private $listaFavoritos = [];

    public function verPanel(){
        require_once VIEW_PATH.'visitanteView.php';
    }

    public function verVideos(){
        //se podran ver los videos que sean publicos
    }

    public function valorar(){
        //se valoraran los videos 
    }

    public function comentar(){

    }

    public function anadirFavorito(){
        //se añadira el favorito al array $listaFavoritos
    }


    }



?>