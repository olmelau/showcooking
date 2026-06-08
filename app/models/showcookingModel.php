<?php

require_once CONFIG_PATH . 'conexionBaseDatos.php';
session_start();


class ShowcookingModel
{
    private $db;
    public function __construct()
    {
        $this->db = ConexionBD::conexion();
    }

    //aqui traigo los showCookings de la base de datos
    public function listarShowCooking()
    {

        $sql = "SELECT * FROM showcooking
                WHERE publicado = 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        // $sql2 = "SELECT valoracion FROM valora AS v
        //             INNER JOIN showcooking AS s on v.id_showcooking = s.id_showcooking";

        return $stmt->fetchAll();

    }


}


?>

