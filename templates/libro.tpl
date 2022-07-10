<!DOCTYPE html>
<html lang="en">
<head>
    {include file="headContent.tpl"}
</head>
<body>
{include file="navbar.tpl"}

{if $libro neq null}

    <h1>{$libro->titulo}:</h1>
    
    <ul class="list-group listaLibro">
        <li class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true"><span class="negrita">Título:</span> {$libro->titulo}</li>
        <li class="list-group-item list-group-item-action list-group-item-dark"><span class="negrita">Género:</span> {$libro->genero}</li>
        <li class="list-group-item list-group-item-action list-group-item-dark"><span class="negrita">Autor:</span> {$libro->nombre_autor}</li>
        <li class="list-group-item list-group-item-action list-group-item-dark"><span class="negrita">Fecha de publicación:</span> {$libro->fecha_publicacion}</li>
    </ul>    
{else}
    
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            El libro que buscó no existe.
        </div>
    </div>
{/if}


{include file="footer.tpl"}