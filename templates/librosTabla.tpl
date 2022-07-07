{include file="head.tpl"}
{include file="navbar.tpl"}

<table class="table table-dark table-hover librosTabla">
    <thead>
        <tr>
            <th>Título</th>
            <th>Género</th>
            <th>Autor</th>
            <th>Fecha de publicación</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$libros item=$libro}            
            <tr>
                <td><a href="libros/{$libro->id}">{$libro->titulo}</a></td>
                <td>{$libro->genero}</td>
                <td><a href="autores/{$libro->id_autor}/libros">{$libro->nombre_autor}</a></td>
                <td class="fecha_th">{$libro->fecha_publicacion}</td>
            </tr>            
        {/foreach}
    </tbody>
</table>

{include file="footer.tpl"}