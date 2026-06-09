<?php

require_once CONFIG_PATH . 'conexionBaseDatos.php';
session_start();


class ShowcookingModel
{
    private $db;
    public function __construct()
    {
        $this->db = ConexionBD::conexion();
    }

    //aqui traigo los showCookings de la base de datos
    public function listarShowCooking()
    {
        $sql = "SELECT 
                s.id_showcooking,
                s.titulo,
                s.descripcion,
                s.url_youtube,
                s.fecha_creacion,
                s.foto_url,
                s.chefs,
                ca.nombre_categoria,
                GROUP_CONCAT(DISTINCT co.comentario SEPARATOR ' | ') AS comentarios,
                COUNT(DISTINCT fa.id_usuario) AS num_fav,
                ROUND(AVG(v.valoracion), 1) AS valoracion_media,
                COUNT(DISTINCT v.id_usuario) AS num_valoraciones
                    FROM showcooking s
                    INNER JOIN categoria ca 
                        ON ca.id_categoria = s.id_categoria
                    LEFT JOIN comenta co 
                        ON co.id_showcooking = s.id_showcooking
                    LEFT JOIN favoritos fa 
                        ON fa.id_showcooking = s.id_showcooking
                    LEFT JOIN valora v 
                        ON v.id_showcooking = s.id_showcooking
                    WHERE s.publicado = 1
                    GROUP BY 
                s.id_showcooking,
                s.titulo,
                s.descripcion,
                s.url_youtube,
                s.fecha_creacion,
                s.foto_url,
                s.chefs,
                ca.nombre_categoria;";


        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function insertarShowcooking($datos)
    {

        $sqlInsert = "INSERT INTO showcooking (titulo, descripcion, url_youtube, fecha_creacion, foto_url, chefs, id_categoria, publicado, id_propietario)
                        VALUES (:titulo, :descripcion, :url_youtube, SYSDATE(), :foto_url, :chefs, 1, 1, 1)";

        $stmt = $this->db->prepare($sqlInsert);
        $stmt->bindParam(':titulo', $datos['titulo'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':url_youtube', $datos['url_youtube'], PDO::PARAM_STR);
        $stmt->bindParam(':foto_url', $datos['foto_url'], PDO::PARAM_STR);
        $stmt->bindParam(':chefs', $datos['chefs'], PDO::PARAM_STR);

        $stmt->execute();

        return true;

    }

    public function verShowCookingById($id)
    {

        $sql = "SELECT * FROM showcooking
                WHERE id_showcooking = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}


?>