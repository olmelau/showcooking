<?php

require_once CONFIG_PATH . 'conexionBaseDatos.php';
class UserModel
{

    private $db;
    public function __construct()
    {
        $this->db = ConexionBD::conexion();
    }

    //-------------------------------- USUARIOS ----------------------------
    public function getUsuarios()
    {
        //devuelve todos los usuarios
        $sql = "SELECT * FROM usuario";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarUsuario($username, $contrasena, $email, $id_rol)
    {
        //añade un usuario a la tabla
        $sql = "INSERT INTO usuario (username, contrasena, email, id_rol)
                VALUES (:username, :contrasena, :email, :id_rol)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);

        return $stmt->execute();

    }

    public function borrarUsuario($username)
    {

        $sql = "DELETE FROM usuario
                WHERE (username = :username)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function actualizarUsuario($username, $username_nuevo, $contrasena_nueva, $email_nuevo, $id_rol_nuevo)
    {


        $sql = "UPDATE usuario
                SET username = :username_nuevo, contrasena = :contrasena_nueva, email = :email_nuevo, id_rol = :id_rol_nuevo
                WHERE username = :username";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':username_nuevo', $username_nuevo, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena_nueva', $contrasena_nueva, PDO::PARAM_STR);
        $stmt->bindParam(':email_nuevo', $email_nuevo, PDO::PARAM_STR);
        $stmt->bindParam(':id_rol_nuevo', $id_rol_nuevo, PDO::PARAM_INT);

        return $stmt->execute();

    }

    //-------------------------------- CATEGORIAS ----------------------------
    public function getCategorias()
    {

        $sql = "SELECT * FROM categoria";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarCategoria($nombre_categoria)
    {
        $sql = "INSERT INTO categoria (nombre_categoria)
                VALUES (:nombre_categoria)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nombre_categoria', $nombre_categoria, PDO::PARAM_STR);
        return $stmt->execute();

    }

    public function eliminarCategoria($categoria)
    {
        $sql = "DELETE FROM categoria
                WHERE (nombre_categoria = :categoria)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function actualizarCategoria($nombre_categoria, $nombre_categoria_nuevo)
    {

        $sql = "UPDATE categoria
                SET nombre_categoria = :nombre_categoria_nuevo
                WHERE nombre_categoria = :nombre_categoria";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nombre_categoria', $nombre_categoria, PDO::PARAM_STR);
        $stmt->bindParam(':nombre_categoria_nuevo', $nombre_categoria_nuevo, PDO::PARAM_STR);
        return $stmt->execute();

    }

    // -------------------------------- VISITANTE ----------------------------
    public function valorarShowcooking($titulo, $valoracion, $id_usuario)
    {

        $sql = "SELECT id_showcooking FROM showcooking
                WHERE titulo = :titulo";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->execute();
        $id_showcooking = $stmt->fetchColumn();


        $sql2 = "INSERT INTO valora (id_usuario, id_showcooking, valoracion, fecha)
                 VALUES (:id_usuario, :id_showcooking, :valoracion, SYSDATE())";
        $stmt = $this->db->prepare($sql2);
        $stmt->bindParam(':id_showcooking', $id_showcooking, PDO::PARAM_INT);
        $stmt->bindParam(':valoracion', $valoracion, PDO::PARAM_INT);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $valorarOK = $stmt->execute();

        if ($valorarOK) {
            return true;
        } else {
            return false;
        }

    }

    public function getShowcooking()
    {

        $sql = 'SELECT * FROM showcooking
                WHERE publicado = 1';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }

    public function insertarComentario($titulo, $comentario, $id_usuario)
    {

        $sql = "SELECT id_showcooking FROM showcooking
                WHERE titulo = :titulo";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->execute();
        $id_showcooking = $stmt->fetchColumn();

        $sql2 = "INSERT INTO comenta (id_usuario, id_showcooking, comentario, fecha)
                 VALUES (:id_usuario, :id_showcooking, :comentario, SYSDATE())";
        $stmt = $this->db->prepare($sql2);
        $stmt->bindParam(':id_showcooking', $id_showcooking, PDO::PARAM_INT);
        $stmt->bindParam(':comentario', $comentario, PDO::PARAM_STR);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $comentarOK = $stmt->execute();

        if ($comentarOK) {
            return true;
        } else {
            return false;
        }
    }

    public function insertarFavorito($id_usuario, $titulo)
    {

        $sql = "SELECT id_showcooking FROM showcooking WHERE titulo = :titulo";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->execute();
        $id_showcooking = $stmt->fetchColumn();


        $sqlInsert = "INSERT INTO favoritos (id_usuario, id_showcooking)
                 VALUES (:id_usuario, :id_showcooking)";

        $stmt = $this->db->prepare($sqlInsert);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(':id_showcooking', $id_showcooking, PDO::PARAM_INT);

        $insertOK = $stmt->execute();

        return $insertOK;

    }


    public function getFavoritos($id_usuario)
    {
        $sql = "SELECT f.id_showcooking, s.titulo 
                FROM favoritos as f
                INNER JOIN showcooking as s on f.id_showcooking = s.id_showcooking
                WHERE f.id_usuario = :id_usuario";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    //----------------------------------  COCINERO -----------------------------
    public function getShowcookingPropio($id_usuario)
    {

        $sql = "SELECT * FROM showcooking
                WHERE id_propietario = :id_usuario";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();

        $showcooking = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $showcooking;
    }

    public function insertarShowcookingNuevo($titulo, $descripcion, $url_youtube, $foto_url, $chefs, $nom_categoria, $id_propietario)
    {
        $sql = "SELECT id_categoria FROM categoria
                WHERE nombre_categoria = :nombre_categoria";

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':nombre_categoria', $nom_categoria, PDO::PARAM_STR);

        $stmt->execute();
        $id_categoria = $stmt->fetchColumn();


        $sqlInsert = "INSERT INTO showcooking (titulo, descripcion, url_youtube, fecha_creacion, foto_url, chefs, id_categoria, publicado, id_propietario)
                VALUES (:titulo, :descripcion, :url_youtube, SYSDATE(), :foto_url , :chefs, :id_categoria, 0, :id_propietario)";

        $stmt = $this->db->prepare($sqlInsert);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':url_youtube', $url_youtube, PDO::PARAM_STR);
        $stmt->bindParam(':foto_url', $foto_url, PDO::PARAM_STR);
        $stmt->bindParam(':chefs', $chefs, PDO::PARAM_STR);
        $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
        $stmt->bindParam(':id_propietario', $id_propietario, PDO::PARAM_INT);


        return $stmt->execute();
    }

    public function actualizarShowcooking($id_usuario, $titulo, $titulo_nuevo, $descripcion_nueva, $url_youtube_nueva, $foto_url_nueva, $chefs_nuevos, $categoria_nueva)
    {
        // ID SHOWCOOKING
        $sql_idshowcooking = "SELECT id_showcooking FROM showcooking WHERE titulo = :titulo AND id_propietario = :id_usuario";
        $stmt = $this->db->prepare($sql_idshowcooking);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        $id_showcooking = $stmt->fetchColumn();

        // ID CATEGORIA
        $sql_idCategoria = "SELECT id_categoria FROM categoria WHERE nombre_categoria = :categoria_nueva";
        $stmt = $this->db->prepare($sql_idCategoria);
        $stmt->bindParam(':categoria_nueva', $categoria_nueva, PDO::PARAM_STR);
        $stmt->execute();
        $id_categoria_nueva = $stmt->fetchColumn();

        //ACTUALZIAR TABLA
        $sqlUpdate = "UPDATE showcooking
                SET titulo = :titulo_nuevo, descripcion = :descripcion_nueva, url_youtube = :url_youtube_nueva, foto_url = :foto_url_nueva, chefs = :chefs_nuevos, id_categoria = :id_categoria_nueva
                WHERE id_showcooking = :id_showcooking";

        $stmt = $this->db->prepare($sqlUpdate);
        $stmt->bindParam(':titulo_nuevo', $titulo_nuevo, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion_nueva', $descripcion_nueva, PDO::PARAM_STR);
        $stmt->bindParam(':url_youtube_nueva', $url_youtube_nueva, PDO::PARAM_STR);
        $stmt->bindParam(':foto_url_nueva', $foto_url_nueva, PDO::PARAM_STR);
        $stmt->bindParam(':chefs_nuevos', $chefs_nuevos, PDO::PARAM_STR);
        $stmt->bindParam(':id_categoria_nueva', $id_categoria_nueva, PDO::PARAM_INT);
        $stmt->bindParam(':id_showcooking', $id_showcooking, PDO::PARAM_INT);

        $showcookingOK = $stmt->execute();

        return $showcookingOK;

    }

    public function cambiarEstadoshowcooking($id_usuario, $titulo, $publicado)
    {

        // ID SHOWCOOKING
        $sql_idshowcooking = "SELECT id_showcooking FROM showcooking WHERE titulo = :titulo AND id_propietario = :id_usuario";
        $stmt = $this->db->prepare($sql_idshowcooking);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        $id_showcooking = $stmt->fetchColumn();

        $sqlUpdate = "UPDATE showcooking 
                      SET publicado = :publicado
                      WHERE id_showcooking = :id_showcooking";
        $stmt = $this->db->prepare($sqlUpdate);
        $stmt->bindParam(':publicado', $publicado, PDO::PARAM_BOOL);
        $stmt->bindParam(':id_showcooking', $id_showcooking, PDO::PARAM_INT);


        $cambiarEstadoOK = $stmt->execute();

        return $cambiarEstadoOK;




    }

}

?>