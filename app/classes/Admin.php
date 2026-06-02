<?php 

require_once 'Usuario.php';
require_once MODEL_PATH.'userModel.php';

class Admin extends Usuario{

 
    public function verPanel(){
        require_once VIEW_PATH.'adminView.php';
    
    }
        
        public function verUsuario(){
        $modelo = new UserModel();
        $usuarios = $modelo->getUsuarios();
        return $usuarios;
    }
    public function crearUsuario($username, $contrasena, $email, $id_rol){
        $modelo = new UserModel();
        $insertarOK = $modelo->insertarUsuario($username, $contrasena, $email, $id_rol);

        if ($insertarOK) {
            return true;
        }    else {
           return false;
        }

    }
    public function eliminarUsuario($usuario){
        $modelo = new UserModel();
        $borrarOK = $modelo->borrarUsuario($usuario);
         if ($borrarOK) {
            return true;
        }    else {
           return false;
        }
    }

    public function editarUsuario($username, $username_nuevo, $contrasena_nueva, $email_nuevo, $id_rol_nuevo){
        $modelo = new UserModel();
        $modificarOK = $modelo->actualizarUsuario($username, $username_nuevo, $contrasena_nueva, $email_nuevo, $id_rol_nuevo);
          
        if ($modificarOK) {
            return true;
        }    else {
           return false;
        }
    }

    public function verCategorias(){
        $modelo = new UserModel();
        $categorias = $modelo->getCategorias();
        return $categorias;
    }

    public function crearCategoria($nombre_categoria){

    $modelo = new UserModel();
    $insertarOK = $modelo->insertarCategoria($nombre_categoria);

    if ($insertarOK) {
            return true;
        }    else {
           return false;
        }

    }

    public function eliminarCategoria ($categoria){
        $modelo = new UserModel();
        $eliminarOK = $modelo->eliminarCategoria($categoria);

          if ($eliminarOK) {
            return true;
        }    else {
           return false;
        }

    }






}


?>