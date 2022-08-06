<?php
class LibrosModel {

    private $db;

    function __construct() {

        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_libros;charset=utf8', 'root', '');
    }

    function getLibrosOffset($offset, $limit) { //Obtiene una cantidad determinada de libros

        $query = $this->db->prepare("SELECT l.*, a.nombre AS nombre_autor FROM libro l JOIN autor a ON l.id_autor = a.id ORDER BY a.nombre LIMIT $offset,$limit"); //Se pasa directamente la variable porque salta error de la sintáxis de la consulta
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getLibros() { //Obtiene todos los libros

        $query = $this->db->prepare("SELECT l.*, a.nombre AS nombre_autor FROM libro l JOIN autor a ON l.id_autor = a.id ORDER BY a.nombre");
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

    function editLibro($titulo, $autor, $genero, $fecha, $id, $pathImg = null) { //Se pone el path siempre al final porque sino me da error de tokens

        $query = $this->db->prepare("UPDATE libro SET titulo = ?, id_autor = ?, genero = ?, fecha_publicacion = ?, imagen = ? WHERE id = ?");
        $query->execute([$titulo, $autor, $genero, $fecha, $pathImg, $id]);
    }

    function deleteImg($id) {

        $query = $this->db->prepare("UPDATE libro SET imagen = null WHERE id = ?");
        $query->execute([$id]);
    }

    function getLibrosSearch($busqueda) {

        $query = $this->db->prepare("SELECT l.*, a.nombre AS nombre_autor FROM libro l JOIN autor a ON l.id_autor = a.id WHERE l.titulo LIKE CONCAT('%',?,'%') OR l.genero LIKE CONCAT('%',?,'%') OR a.nombre LIKE CONCAT('%',?,'%') ORDER BY a.nombre");
        $query->execute([$busqueda, $busqueda, $busqueda]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getLibrosSearchOffset($busqueda, $offset, $limit) {

        $query = $this->db->prepare("SELECT l.*, a.nombre AS nombre_autor FROM libro l JOIN autor a ON l.id_autor = a.id WHERE l.titulo LIKE CONCAT('%',?,'%') OR l.genero LIKE CONCAT('%',?,'%') OR a.nombre LIKE CONCAT('%',?,'%') ORDER BY a.nombre LIMIT $offset,$limit");
        $query->execute([$busqueda, $busqueda, $busqueda]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
?>