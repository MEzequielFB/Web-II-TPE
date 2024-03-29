<!DOCTYPE html>
<html lang="en">
<head>
    {include file="headContent.tpl"}
    {if $rolUsuario eq 1}
        <script src="{$base_url}js/selectValidation.js"></script>
    {/if}
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="{$base_url}js/comentarios.js"></script>
    <script src="{$base_url}js/hideFileInput.js"></script>
</head>
<body>
{include file="navbar.tpl"}

<h1>{$libro->titulo}:</h1>

<ul class="list-group listaLibro">
    <li class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true"><span class="negrita">Título:</span> {$libro->titulo}</li>
    <li class="list-group-item list-group-item-action list-group-item-dark"><span class="negrita">Género:</span> {$libro->genero}</li>
    <li class="list-group-item list-group-item-action list-group-item-dark"><span class="negrita">Autor:</span> {$libro->nombre_autor}</li>
    <li class="list-group-item list-group-item-action list-group-item-dark"><span class="negrita">Fecha de publicación:</span> {$libro->fecha_publicacion}</li>    
    {if $libro->imagen neq null}
        <li class="list-group-item list-group-item-action list-group-item-dark libroImagenItem">
            <img src="{$libro->imagen}">
            {if $rolUsuario eq 1}
                <a href="libros/img/delete/{$libro->id}"><img src="img/cancel.png" class="deleteImgBtn"></a>
            {/if}            
        </li>
    {/if}
</ul>

<h1>Editar libro</h1>
{if $rolUsuario eq 1}
    <form action="libros/edit/{$libro->id}" method="post" class="libroForm" enctype="multipart/form-data">
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

        <div class="input-group mb-3 imagenInputDiv"> <!--Input adjuntar una imágen al libro-->
            <label class="input-group-text" for="imagenInput">Imágen</label>
            <input type="file" class="form-control" name="imagenInput" id="imagenInput">
        </div>

        <button class="btn btn-outline-secondary" id="button-addon1">Editar libro</button>
    </form>
{/if}

<h1>Comentar</h1>
<form action="" class="comentarioForm">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="comentarioInput" id="comentarioInput" required placeholder="Comentario">
        <label for="comentarioInput">Comentar</label>
    </div>

    <label for="comentarioSelect" class="comentarioSelectLabel">Puntuación:</label>
    <select class="form-select" name="comentarioSelect" id="comentarioSelect" required aria-label="Default select example">        
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>

    <input type="hidden" class="usuarioIdInput" value="{$idUsuario}">    

    <button type="button" class="btn btn-outline-secondary" id="comentarioBtn">Comentar</button>
</form>

<h1>Comentarios</h1>
{include file="vue/comentarios.tpl"}

{include file="footer.tpl"}