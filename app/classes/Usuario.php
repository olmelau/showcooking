<?php

class Usuario
{
   protected $id_usuario;
   protected $username;
   protected $contrasena;
   protected $email;
   protected $id_rol;



   //constructor
   public function __construct($id_usuario, $username, $contrasena, $email, $id_rol)
   {

      $this->id_usuario = $id_usuario;
      $this->username = $username;
      $this->contrasena = $contrasena;
      $this->email = $email;
      $this->id_rol = $id_rol;

   }

   //Getters
   public function getIdusuario()
   {
      return $this->id_usuario;
   }
   public function getUsername()
   {
      return $this->username;
   }
   public function getEmail()
   {
      return $this->email;
   }
   public function getIdRol()
   {
      return $this->id_rol;
   }

   //Setter
   public function setUsername($username)
   {
      $this->username = $username;
   }
   public function setEmail($email)
   {
      $this->email = $email;
   }
   public function setContrasena($contrasena)
   {
      $this->contrasena = $contrasena;
   }

   //métodos propios de usuario
   public function iniciarSesion()
   {
   }

   public static function cerrarSesion()
   {
      if (isset($_SESSION['usuario']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
         //en la documentacion de php he encontrado esto para cerrar sesion
         if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
               session_name(),
               '',
               time() - 42000,
               $params["path"],
               $params["domain"],
               $params["secure"],
               $params["httponly"]
            );
         }

         // Finalmente, se destruye la sesión.
         session_destroy();

         //redirigir a login
         header('Location:/desarrollo_servidor/Showcooking/public/index.php');

      }
   }

   public function registrarse()
   {
   }

   public function comprobarCredenciales()
   {

   }








}

?>