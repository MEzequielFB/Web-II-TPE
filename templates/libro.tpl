<!DOCTYPE html>
<html lang="en">
<head>
    {include file="headContent.tpl"}
    <script src="{$base_url}js/selectValidation.js"></script>
</head>
<body>
{include file="navbar.tpl"}

<h1>{$libro->titulo}:</h1>

<ul class="list-group listaLibro">
    <li class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true"><span class="negrita">Título:</span> {$libro->titulo}</li>
    <li class="list-group-item list-group-item-action list-group-item-dark"><span class="negrita">Género:</span> {$libro->genero}</li>
    <li class="list-group-item list-group-item-action list-group-item-dark"><span class="negrita">Autor:</span> {$libro->nombre_autor}</li>
    <li class="list-group-item list-group-item-action list-group-item-dark"><span class="negrita">Fecha de publicación:</span> {$libro->fecha_publicacion}</li>
</ul>    

{if $rolUsuario eq 1}
    <form action="libros/edit/{$libro->id}" method="post" class="editLibroForm">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="tituloInput" id="tituloInput" required placeholder="Título" value="{$libro->titulo}">
            <label for="tituloInput">Título</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control" name="generoInput" id="generoInput" required placeholder="Género" value="{$libro->genero}">
            <label for="generoInput">Género</label>
        </div>

        <select class="form-select" name="autorSelect" id="autorSelect" required aria-label="Default select example">
            <option value="noAutor">Elija un autor</option>
            {foreach from=$autores item=$autor}

                {if $libro->id_autor eq $autor->id}
                    <option value="{$autor->id}" selected>{$autor->nombre}</option>
                {else}
                    <option value="{$autor->id}">{$autor->nombre}</option>
                {/if}            
            {/foreach}
        </select>
        <div class="alert alert-danger alertaSelect hide" role="alert">
            
        </div>

        <label for="fechaInput" class="labelForm">Fecha de publicación: </label>
        <input type="date" name="fechaInput" id="fechaInput" value="{$libro->fecha_publicacion}" required>

        <button class="btn btn-outline-secondary" id="button-addon1">Editar libro</button>
    </form>
{/if}

{include file="footer.tpl"}