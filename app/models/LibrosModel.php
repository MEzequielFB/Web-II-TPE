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

    function insertLibro($titulo, $autor, $genero, $fecha) {

        $query = $this->db->prepare("INSERT INTO libro(titulo, id_autor, genero, fecha_publicacion) VALUES(?,?,?,?)");
        $query->execute([$titulo, $autor, $genero, $fecha]);
        
        return $this->db->lastInsertId();
    }
}
?>