<?php

session_start();
require_once CONFIG_PATH.'conexionBaseDatos.php';


class ShowcookingModel
{
    private $db;
    public function __construct(){
        $this->db = ConexionBD::conexion();
    }

    //aqui traigo los showCookings de la base de datos
    public function listarShowCooking(){
            
        $sql = "SELECT * FROM showcooking
                WHERE publicado = 1";
                
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }


}


?>