<?php
class LibrosModel {

    private $db;

    function __construct() {

        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_libros;charset=utf8', 'root', '');
    }

    function getLibros() {

        $query = $this->db->prepare("SELECT l.*, a.nombre AS nombre_autor FROM libro l JOIN autor a ON l.id_autor = a.id");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getLibrosByAutor($id) {
     
        $query = $this->db->prepare("SELECT l.*, a.nombre AS nombre_autor FROM libro l JOIN autor a ON l.id_autor = a.id WHERE l.id_autor = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getLibro($id) {

        $query = $this->db->prepare("SELECT l.*, a.nombre AS nombre_autor FROM libro l JOIN autor a ON l.id_autor = a.id WHERE l.id = ?");
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    function insertLibro($titulo, $autor, $genero, $fecha, $pathImg = null) {

        $query = $this->db->prepare("INSERT INTO libro(titulo, id_autor, genero, fecha_publicacion, imagen) VALUES(?,?,?,?,?)");
        $query->execute([$titulo, $autor, $genero, $fecha, $pathImg]);
        
        return $this->db->lastInsertId();
    }

    function deleteLibro($id) {

        $query = $this->db->prepare("DELETE FROM libro WHERE id = ?");
        $query->execute([$id]);        
    }

    function editLibro($titulo, $autor, $genero, $fecha, $id) {

        $query = $this->db->prepare("UPDATE libro SET titulo = ?, id_autor = ?, genero = ?, fecha_publicacion = ? WHERE id = ?");
        $query->execute([$titulo, $autor, $genero, $fecha, $id]);        
    }
}
?>