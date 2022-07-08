<table class="table table-dark table-hover autoresTabla">
    <thead>
        <tr>
            <th></th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$autores item=$autor}
            <tr>
                <td><a href="autores/{$autor->id}/libros">{$autor->nombre}</a></td>
            </tr>
        {/foreach}
    </tbody>
</table>