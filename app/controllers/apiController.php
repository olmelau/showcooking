<?php

// require_once CONFIG_PATH.'conexionBaseDatos.php';
require_once MODEL_PATH . 'showcookingModel.php';


class ApiController
{


    public function showcooking($id = null) //$id = null -> si no le pasamos id lo asigna a null y si pasamos un id lo entiende 
    {


        //metodo devolver listado showcooking si no hay id devuelve los publicos
        if ($id == null) {

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
               
                $showCookingModel = new ShowcookingModel();
                $showCooking = $showCookingModel->listarShowCooking();
                header('Content-Type: application/json');
                echo json_encode($showCooking);
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $datos = json_decode(file_get_contents("php://input"), true); //esto es lo que en prinicpio viene de un formulario o del postman o de donde añadas la info

                /**
                 *  esto es lo que hay que insertar en body en postman
                 * 
                    {
                    "titulo": "Pasta carbonara",
                    "descripcion": "Pasta Muy Rica",
                    "url_youtube": "youtube.com/1",
                    "foto_url": "carbonara.jpg",
                    "chefs": "Giuseppe Rossi"
                    }

                 * 
                 * 
                 * 
                 */

                $showCookingModel = new ShowcookingModel();
                $showCooking = $showCookingModel->insertarShowcooking($datos);
                header('Content-Type: application/json');
                echo json_encode($showCooking);
            }
        } else {
            //si se añade un id a la uri devuelve ese showcooking concreto
               $showCookingModel = new ShowcookingModel();
                $showCooking = $showCookingModel->verShowCookingById($id);
                header('Content-Type: application/json');
                echo json_encode($showCooking);
        }


    }


}

?>