<table class="table table-dark table-hover librosTabla">
    <thead>
        <tr>
            <th>Título</th>
            <th>Género</th>
            <th>Autor</th>
            <th class="fecha_th">Fecha de publicación</th>
            {if $rolUsuario eq 1}
                <th class="botones_th"></th>
            {/if}             
        </tr>
    </thead>
    <tbody>
        {foreach from=$libros item=$libro}            
            <tr>
                <td><a href="libros/{$libro->id}">{$libro->titulo}</a></td>
                <td>{$libro->genero}</td>
                <td><a href="autores/{$libro->id_autor}/libros">{$libro->nombre_autor}</a></td>
                <td>{$libro->fecha_publicacion}</td>
                {if $rolUsuario eq 1}
                    <td>
                        <a href="libros/delete/{$libro->id}"><img src="img/delete.png"></a>
                    </td>
                {/if}                
            </tr>            
        {/foreach}
    </tbody>
</table>