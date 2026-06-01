<?php

require_once CLASSES_PATH.'Admin.php';
session_start();

class AdminController{


    
    public function verUsuarios(){
        $admin = $_SESSION['admin'];
        $usuarios = $admin->verUsuario();

        // var_dump($usuarios);
        $this->imprimirUsuarios($usuarios);

    }


    public function imprimirUsuarios($usuarios){

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

    public function imprimirPanel(){
        $admin = $_SESSION['admin'];
        $admin->verPanel();
    }

        public function volverAtras(){
            
            echo "<form action='/desarrollo_servidor/Showcooking/public/index.php/admin/imprimirPanel'>
                <button>Volver Atrás</button>    
            </form>";
        }

}


?>