<?php

class Usuario{

    private $id_usuario;
    private $username;
    private $contrasena;
    private $email;
    private $id_rol;

    //Getters
    public function getIdusuario(){
        return $this->id_usuario;
    }
     public function getUsername(){
       return $this->username;
    }
    public function getEmail(){
      return $this->email;
   }
    public function getIdRol(){
      return $this->id_rol;
   }

   //Setter
   public function setUsername($username){
    $this->username = $username;
   }
   public function setEmail($email){
    $this->email = $email;
   }
   public function setContrasena($contrasena){
    $this->contrasena = $contrasena;
   }

   //métodos propios de usuario
   public function iniciarSesion(){
   }

   public function cerrarSesion(){
   }

   public function registrarse(){
   }

   public function comprobarCredenciales(){
   }



    


    

}

?>