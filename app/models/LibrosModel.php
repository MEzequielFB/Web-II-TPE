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
}
?>