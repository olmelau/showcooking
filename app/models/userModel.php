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


    public function insertarUsuario($username, $contrasena, $email, $id_rol){
        //añade un usuario a la tabla
        $sql = "INSERT INTO usuario (username, contrasena, email, id_rol)
                VALUES (:username, :contrasena, :email, :id_rol)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);

        return $stmt->execute();

    }

    public function borrarUsuario($username){

        $sql = "DELETE FROM usuario
                WHERE (username = :username)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        return $stmt->execute();


    }

}

?>