<?php

require_once CONFIG_PATH.'conexionBaseDatos.php';
class UserModel{

    private $db;
    public function __construct(){
        $this->db = ConexionBD::conexion();
    }

    public function getUsuarios(){
        //devuelve todos los usuarios
        $sql = "SELECT * FROM usuario";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }


    public function insertarUsuario(){
        //añade un usuario a la tabla

    }

}

?>