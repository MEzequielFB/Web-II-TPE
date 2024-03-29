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

<h1>{$titulo}</h1>
{include file="autoresTabla.tpl"}

{if $rolUsuario eq 1}
    <h1>Añadir un autor:</h1>

    <form action="autores/add" method="post" class="addAutorForm">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="autorInput" id="autorInput" required placeholder="Nombre del autor">
            <label for="autorInput">Nombre del autor</label>
        </div>    

        <button class="btn btn-outline-secondary" id="button-addon1">Agregar autor</button>
    </form>
{/if}

{include file="footer.tpl"}