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
    public function listarShowCooking($id_rol, $id_usuario)
    {


        switch ($id_rol) {
            // Si es admin ve todo
            case 1:
                $sql = "SELECT * FROM showcooking";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                break;

            //si es cocinero ve publicados y sus no publicados
            case 2:
                if ($id_usuario) {
                    $sql = "SELECT * FROM showcooking 
                        WHERE publicado = 1 OR (publicado = 0 AND id_propietario = :id_usuario) ";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                    $stmt->execute();
                } else {
                    $sql = "SELECT * FROM showcooking WHERE publicado = 1";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute();
                }
                break;

            default: // Visitante->solo publicados
                $sql = "SELECT * FROM showcooking WHERE publicado = 1";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                break;
        }

        $showcookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($showcookings as $key => $show) {
            $id = $show['id_showcooking'];

            // Valoración promedio
            $stmtVal = $this->db->prepare("SELECT AVG(valoracion) as promedio, COUNT(*) as total FROM valora WHERE id_showcooking = :id");
            $stmtVal->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtVal->execute();
            $valoracion = $stmtVal->fetch(PDO::FETCH_ASSOC);

            $showcookings[$key]['valoracion_promedio'] = round($valoracion['promedio'] ?? 0, 1);
            $showcookings[$key]['total_valoraciones'] = (int) ($valoracion['total'] ?? 0);

            // Total comentarios
            $stmtCom = $this->db->prepare("SELECT COUNT(*) as total FROM comenta WHERE id_showcooking = :id");
            $stmtCom->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtCom->execute();
            $comentarios = $stmtCom->fetch(PDO::FETCH_ASSOC);
            $showcookings[$key]['total_comentarios'] = (int) $comentarios['total'];

            // Total favoritos
            $stmtFav = $this->db->prepare("SELECT COUNT(*) as total FROM favoritos WHERE id_showcooking = :id");
            $stmtFav->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtFav->execute();
            $favoritos = $stmtFav->fetch(PDO::FETCH_ASSOC);
            $showcookings[$key]['total_favoritos'] = (int) $favoritos['total'];

            // Últimos 3 comentarios con detalles
            $stmtComDet = $this->db->prepare("SELECT u.username, c.comentario, c.fecha 
                                          FROM comenta c 
                                          JOIN usuario u ON c.id_usuario = u.id_usuario 
                                          WHERE c.id_showcooking = :id 
                                          ORDER BY c.fecha DESC LIMIT 3");
            $stmtComDet->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtComDet->execute();
            $showcookings[$key]['ultimos_comentarios'] = $stmtComDet->fetchAll(PDO::FETCH_ASSOC);
        }

        return [
            'success' => true,
            'data' => $showcookings,
            'total' => count($showcookings)
        ];
    }
}





?>