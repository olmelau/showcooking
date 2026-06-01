<?php

require_once CLASSES_PATH . 'Admin.php';
session_start();

class AdminController
{

    public function verUsuarios()
    {
        $admin = $_SESSION['admin'];
        $usuarios = $admin->verUsuario();

        // var_dump($usuarios);
        $this->imprimirUsuarios($usuarios);

    }

    public function crearUsuarioFormulario()
    {
        require_once VIEW_PATH . 'crearUsuarioView.php';
    }

    public function crearUsuario()
    {

        $username = $_POST['username'];
        $contrasena = $_POST['contrasena'];
        $email = $_POST['email'];
        $id_rol = $_POST['id_rol'];

        $admin = $_SESSION['admin'];
        // $admin->crearUsuario($username, $contrasena, $email, $id_rol);
        $resultado = $admin->crearUsuario($username, $contrasena, $email, $id_rol);

        if ($resultado === true) {
            echo "Usuario Creado";
            // $this->imprimirPanel();
            $this->volverAtras();
        } else {
            echo "Error al insertar usuario";
            $this->volverAtras();
        }


    }

    public function eliminarUsuarioFormulario(){
        require_once VIEW_PATH . 'borrarUsuarioView.php';
    }

    public function borrarUsuario(){
        $username = $_POST['username'];
        $admin = $_SESSION['admin'];
        $resultado = $admin->eliminarUsuario($username);
        
        if ($resultado === true) {
            echo "Usuario Borrado";
            $this->volverAtras();
        } else {
            echo "Error al borrar usuario";
            $this->volverAtras();
        }
    }


    public function imprimirUsuarios($usuarios)
    {

        if (empty($usuarios)) {
            echo "<p>No hay usuarios para mostrar.</p>";
            return;
        }
        $this->volverAtras();
        echo "<h1>Usuarios</h1>";
        echo "<hr>";
        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Username</th>";
        echo "<th>Email</th>";
        echo "<th>id_rol</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($usuarios as $usuario) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($usuario['id_usuario']) . "</td>";
            echo "<td>" . htmlspecialchars($usuario['username']) . "</td>";
            echo "<td>" . htmlspecialchars($usuario['email']) . "</td>";
            echo "<td>" . htmlspecialchars($usuario['id_rol']) . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }

    public function imprimirPanel()
    {
        $admin = $_SESSION['admin'];
        $admin->verPanel();
    }

    public function volverAtras()
    {
        echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/admin/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";
    }

}


?>