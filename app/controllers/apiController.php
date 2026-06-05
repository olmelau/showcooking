<?php

// require_once CONFIG_PATH.'conexionBaseDatos.php';
require_once MODEL_PATH . 'showcookingModel.php';

class ApiController
{


    //metodo devolver listado showcooking
    public function showcooking()
    {

        $showCookingModel = new ShowcookingModel();
        
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            # code...
            $showCooking = $showCookingModel->listarShowCooking();
            header('Content-Type: application/json');
            echo json_encode($showCooking);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //SI EXITE ACTUALIZO, Y SI NO, INSERTO
            // $_POST[]

            // $showCooking = $showCookingModel->listarShowCooking();
            // header('Content-Type: application/json');
            // echo json_encode($showCooking);

        }

    }

    //metodo que si es post inserte en la bd o actualice
    public function actualizarShowcooking()
    {


    }
    //metodo que si viene con un ID devuelva un JSON con un showcooking concreto si está publicado y si no, 
    // solo lo ve el rol correspondiente.



}

?>