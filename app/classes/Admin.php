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
    public function modificarUsuario($usuario){

        //$usuario = new UserModel();
        //$usuario->updateUsuario($usuario);

    }



}


?>