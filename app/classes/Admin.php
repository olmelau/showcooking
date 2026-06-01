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
    public function crearUsuario($username, $contrasena, $email, $id_rol){
        require_once MODEL_PATH.'userModel.php';
        $modelo = new UserModel();
        $nuevoUser = $modelo->insertarUsuario($username, $contrasena, $email, $id_rol);

        if ($nuevoUser) {
            echo 'usuario creado';
           echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/admin/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";
        }    else {
            require_once VIEW_PATH.'errorView.php';
        }

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