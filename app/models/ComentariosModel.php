<?php
class ComentariosModel {

    private $db;

    function __construct() {

        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_libros;charset=utf8', 'root', '');
    }

    function getComentario($id) {

        $query = $this->db->prepare("SELECT c.id, c.contenido, c.puntuacion, c.id_libro, u.nombre AS usuario FROM comentario c JOIN usuario u ON c.id_usuario = u.id WHERE c.id = ?");
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getComentariosLibro($id) {

        $query = $this->db->prepare("SELECT c.id, c.contenido, c.puntuacion, c.id_libro, u.nombre AS usuario FROM comentario c JOIN usuario u ON c.id_usuario = u.id WHERE c.id_libro = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function insertComentarioLibro($contenido, $puntuacion, $id_usuario, $id_libro) {

        $query = $this->db->prepare("INSERT INTO comentario(contenido, puntuacion, id_usuario, id_libro) VALUES(?,?,?,?)");
        $query->execute([$contenido, $puntuacion, $id_usuario, $id_libro]);

        return $this->db->lastInsertId();
    }
}
?>