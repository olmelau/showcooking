<?php

require_once CLASSES_PATH . 'Admin.php';
require_once CLASSES_PATH . 'VisitanteRegistrado.php';
require_once CLASSES_PATH . 'Cocinero.php';
session_start();

class AdminController
{

    public function comprobarUsuario()
    {

        $admin = $_SESSION['usuario'];
        $id_rol = $admin->getIdRol();
        // var_dump($id_rol);

        if ($id_rol != 1) {
            session_destroy();
            header('Location:/desarrollo_servidor/Showcooking/public/index.php');
            exit();
        }
    }

    //-----------------------------  GESTION DE USUARIOS ----------------------
    public function verUsuarios()
    {
        $this->comprobarUsuario();
        $admin = $_SESSION['usuario'];
        $usuarios = $admin->verUsuario();

        // var_dump($usuarios);
        $this->imprimirUsuarios($usuarios);

    }

    public function crearUsuarioFormulario()
    {

        $this->comprobarUsuario();
        require_once VIEW_PATH . 'crearUsuarioView.php';
    }



    public function crearUsuario()
    {
        $this->comprobarUsuario();

        $username = $_POST['username'];
        $contrasena = $_POST['contrasena'];
        $email = $_POST['email'];
        $id_rol = $_POST['id_rol'];

        $admin = $_SESSION['usuario'];
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

    public function eliminarUsuarioFormulario()
    {
        $this->comprobarUsuario();
        require_once VIEW_PATH . 'borrarUsuarioView.php';
    }

    public function borrarUsuario()
    {

        $this->comprobarUsuario();
        $username = $_POST['username'];
        $admin = $_SESSION['usuario'];
        $resultado = $admin->eliminarUsuario($username);

        if ($resultado === true) {
            echo "Usuario Borrado";
            $this->volverAtras();
        } else {
            echo "Error al borrar usuario";
            $this->volverAtras();
        }
    }

    public function modificarUsuarioFormulario()
    {

        $this->comprobarUsuario();
        require_once VIEW_PATH . 'modificarUsuarioView.php';
    }

    public function modificarUsuario()
    {

        $this->comprobarUsuario();

        $username = $_POST['username'];
        $username_nuevo = $_POST['username_nuevo'];
        $contrasena_nueva = $_POST['contrasena_nueva'];
        $email_nuevo = $_POST['email_nuevo'];
        $id_rol_nuevo = $_POST['id_rol_nuevo'];

        $admin = $_SESSION['usuario'];
        $resultado = $admin->editarUsuario($username, $username_nuevo, $contrasena_nueva, $email_nuevo, $id_rol_nuevo);

        if ($resultado === true) {
            echo "Usuario Modificado";
            $this->volverAtras();
        } else {
            echo "Error al modificar usuario";
            $this->volverAtras();
        }

    }
    //----------------------------- GESTION DE CATEGORIAS ----------------------
    public function verCategorias()
    {

        $this->comprobarUsuario();
        $admin = $_SESSION['usuario'];
        $categorias = $admin->verCategorias();
        $this->imprimirCategorias($categorias);


    }

    public function crearCategoriaFormulario()
    {

        $this->comprobarUsuario();
        require_once VIEW_PATH . 'crearCategoriaView.php';

    }
    public function crearCategoria()
    {

        $this->comprobarUsuario();
        $nombre_categoria = $_POST['nombre_categoria'];

        $admin = $_SESSION['usuario'];

        $resultado = $admin->crearCategoria($nombre_categoria);

        if ($resultado === true) {
            echo "Categoria Creada";
            $this->volverAtras();
        } else {
            echo "Error al crear categoria";
            $this->volverAtras();
        }

    }

    public function eliminarCategoriaFormulario()
    {

        $this->comprobarUsuario();
        require_once VIEW_PATH . 'borrarCategoriaView.php';
    }



    public function borrarCategoria()
    {

        $this->comprobarUsuario();
        $categoria = $_POST['nombre_categoria'];
        $admin = $_SESSION['usuario'];
        $resultado = $admin->eliminarCategoria($categoria);

        if ($resultado === true) {
            echo "Categoría Eliminada";
            $this->volverAtras();
        } else {
            echo "Error al eliminar categoría";
            $this->volverAtras();
        }


    }
    public function actualizarCategoria()
    {

        $this->comprobarUsuario();
        $nombre_categoria = $_POST['nombre_categoria'];
        $nombre_categoria_nuevo = $_POST['nombre_categoria_nuevo'];
        $admin = $_SESSION['usuario'];
        $resultado = $admin->modificarCategoria($nombre_categoria, $nombre_categoria_nuevo);

        if ($resultado === true) {
            echo "Categoría Modificada";
            $this->volverAtras();
        } else {
            echo "Error al modificar categoría";
            $this->volverAtras();
        }

    }
    public function actualizarCategoriaFormulario()
    {

        $this->comprobarUsuario();
        require_once VIEW_PATH . 'modificarCategoriaView.php';
    }

    //------------------------------- MÉTODOS IMPRIMIR ---------------------------
    public function imprimirUsuarios($usuarios)
    {

        $this->comprobarUsuario();

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

        $this->comprobarUsuario();
        $admin = $_SESSION['usuario'];
        $admin->verPanel();
    }

    public function imprimirCategorias($categorias)
    {
        $this->comprobarUsuario();

        if (empty($categorias)) {
            echo "<p>No hay categorias para mostrar.</p>";
            return;
        }
        $this->volverAtras();
        echo "<h1>Categorias</h1>";
        echo "<hr>";
        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre Categoria</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($categorias as $categoria) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($categoria['id_categoria']) . "</td>";
            echo "<td>" . htmlspecialchars($categoria['nombre_categoria']) . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }

    //--------------------------------- VOLVER ATRAS ----------------------------
    
    public function volverAtras()
    {
        echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/admin/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";
    }
    
    //--------------------------------- CERRAR SESION ----------------------------

        public function cerrarSesion(){

        Usuario::cerrarSesion();
        
    
    }

}


?>