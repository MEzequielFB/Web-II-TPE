<?php
class ComentariosModel {

    private $db;

    function __construct() {

        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_libros;charset=utf8', 'root', '');
    }

    function getComentariosLibro($id) {

        $query = $this->db->prepare("SELECT c.id, c.contenido, c.puntuacion, c.id_libro, u.nombre AS usuario FROM comentario c JOIN usuario u ON c.id_usuario = u.id WHERE c.id_libro = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
?>