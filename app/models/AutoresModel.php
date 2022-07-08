<?php
class AutoresModel {

    private $db;

    function __construct() {

        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_libros;charset=utf8', 'root', '');
    }

    function getAutores() {

        $query = $this->db->prepare("SELECT * FROM autor");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getAutor($id) {

        $query = $this->db->prepare("SELECT * FROM autor WHERE id = ?");
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
?>