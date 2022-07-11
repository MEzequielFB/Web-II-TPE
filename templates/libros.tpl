<!DOCTYPE html>
<html lang="en">
<head>
    {include file="headContent.tpl"}
    <script src="js/selectValidation.js"></script>
</head>
<body>
{include file="navbar.tpl"}

<h1>Libros</h1>
{include file="librosTabla.tpl"}

<h1>Añadir un libro</h1>
<form action="libros/add" method="post" class="addLibroForm">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="tituloInput" id="tituloInput" required placeholder="Título">
        <label for="tituloInput">Título</label>
    </div>

    <div class="form-floating">
        <input type="text" class="form-control" name="generoInput" id="generoInput" required placeholder="Género">
        <label for="generoInput">Género</label>
    </div>

    <select class="form-select" name="autorSelect" id="autorSelect" required aria-label="Default select example">
        <option value="noAutor">Elija un autor</option>
        {foreach from=$autores item=$autor}
            <option value="{$autor->id}">{$autor->nombre}</option>
        {/foreach}
    </select>
    <div class="alert alert-danger alertaSelect hide" role="alert">
        
    </div>

    <label for="fechaInput" class="labelForm">Fecha de publicación: </label>
    <input type="date" name="fechaInput" id="fechaInput" required>

    <button class="btn btn-outline-secondary" id="button-addon1">Agregar libro</button>
</form>
<!--{include file="libroForm.tpl"}-->

{include file="footer.tpl"}