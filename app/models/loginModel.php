<?php

require_once '../../config/conexionBaseDatos.php';

class LoginModel{

    private $db;
     
    public function __construct(){

        $this->db = ConexionBD::conexion();


    }

    public function comprobarUsuario($username, $contrasena){

        $sql = "SELECT u.id_usuario, u.id_rol, rol.nombre_rol
                FROM usuario as u 
                INNER JOIN rol as rol on rol.id_rol = u.id_rol
                WHERE username = :username AND contrasena = :contrasena";



        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

        $stmt->execute();

        $datos_usuario = $stmt->fetchAll();

        return $datos_usuario;



    }

}