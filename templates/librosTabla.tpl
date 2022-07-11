<table class="table table-dark table-hover librosTabla">
    <thead>
        <tr>
            <th>Título</th>
            <th>Género</th>
            <th>Autor</th>
            <th class="fecha_th">Fecha de publicación</th>
            <th class="botones_th"></th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$libros item=$libro}            
            <tr>
                <td><a href="libros/{$libro->id}">{$libro->titulo}</a></td>
                <td>{$libro->genero}</td>
                <td><a href="autores/{$libro->id_autor}/libros">{$libro->nombre_autor}</a></td>
                <td>{$libro->fecha_publicacion}</td>
                <td>
                    <a href="libros/delete/{$libro->id}"><img src="img/delete.png"></a>
                    <!--<a href="libros/edit/{$libro->id}"><img src="img/editar.png"></a>-->
                </td>
            </tr>            
        {/foreach}
    </tbody>
</table>