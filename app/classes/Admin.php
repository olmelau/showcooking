<?php 

require_once 'Usuario.php';

class Admin extends Usuario{

 
    public function verPanel(){
        require_once VIEW_PATH.'adminView.php';
    
    }
        
        public function verUsuario(){
        require_once MODEL_PATH.'userModel.php';
        $modelo = new UserModel();
        $usuarios = $modelo->getUsuarios();
        return $usuarios;
    }
    public function crearUsuario($usuarioNuevo){

        //usuario = new UserModel();
        //usuario->insertarUsuario($usuarioNnuevo);


    }
    public function eliminarUsuario($usuario){
        //$usuario = new UserModel();
        //$usuario->borrarUsuario($usuario);
    }
    public function modificarUsuario($usuario){

        //$usuario = new UserModel();
        //$usuario->updateUsuario($usuario);

    }



}


?>