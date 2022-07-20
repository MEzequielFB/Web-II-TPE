<!DOCTYPE html>
<html lang="en">
<head>
    {include file="headContent.tpl"}    
</head>
<body>
{include file="navbar.tpl"}

<h1>{$titulo}</h1>

<ul class="list-group listaAutor">
    <li class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true"><span class="negrita">Nombre:</span> {$autor->nombre}</li>
</ul>

{if $rolUsuario eq 1}
    <h1>Editar autor:</h1>

    <form action="autores/edit/{$autor->id}" method="post" class="editAutorForm">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="autorEditInput" id="autorEditInput" required placeholder="Nombre del autor">
            <label for="autorEditInput">Nuevo nombre del autor</label>
        </div>

        <button class="btn btn-outline-secondary autorEditSubmit" id="button-addon2">Editar autor</button>
    </form>
{/if}

{include file="footer.tpl"}