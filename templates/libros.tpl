<!DOCTYPE html>
<html lang="en">
<head>
    {include file="headContent.tpl"}
    {if $rolUsuario eq 1}
        <script src="{$base_url}js/selectValidation.js"></script>
    {/if}
</head>
<body>
{include file="navbar.tpl"}

<h1>Libros</h1>
{include file="librosTabla.tpl"}

<nav aria-label="Page navigation example" class="librosNav">
  <ul class="pagination">
    {if $pagina neq 1} <!--Si el usuario está en la primera página se oculta el item-->
        <li class="page-item"><a class="page-link" href="page/{$pagina-1}">Anterior</a></li>
    {/if}
    {for $i = 1 to $cantPaginas} <!--Crea items dependiendo de la cantidad de páginas que haya-->
        <li class="page-item"><a class="page-link" href="page/{$i}">{$i}</a></li>
    {/for}
    {if $cantLibros eq 5} <!--Si se muestran menos de 5 libros se oculta el item-->
        <li class="page-item"><a class="page-link" href="page/{$pagina+1}">Siguiente</a></li>
    {/if}    
  </ul>
</nav>

{if $rolUsuario eq 1}

    <h1>Añadir un libro</h1>
    <form action="libros/add" method="post" class="addLibroForm" enctype="multipart/form-data"> <!--enctype="multipart/form-data" permite el envío de archivos al servidor-->
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

        <div class="input-group mb-3"> <!--Input adjuntar una imágen al libro-->
            <label class="input-group-text" for="imagenInput">Imágen</label>
            <input type="file" class="form-control" name="imagenInput" id="imagenInput">
        </div>

        <button class="btn btn-outline-secondary" id="button-addon1">Agregar libro</button>
    </form>
{/if}

{include file="footer.tpl"}