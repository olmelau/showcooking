<?php 

require_once (CONFIG_PATH.'conexionBaseDatos.php');
require_once (MODEL_PATH.'showCookingModel.php');

class ApiController{
    
    
    //metodo devolver showcooking
    public function showcooking(){

        $showCookingModel = new ShowcookingModel();
        $showCooking = $showCookingModel->listarShowCooking();

        $showCookingJSON = json_encode($showCooking);

        echo $showCookingJSON;


    }
    //metodo que si es post inserte en la bd o actualice

    //metodo que si viene con un ID devuelva un JSON con un showcooking concreto si está publicado y si no, solo lo ve el rol correspondiente.



}

?>