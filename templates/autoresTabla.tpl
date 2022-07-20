<table class="table table-dark table-hover autoresTabla">
    <thead>
        <tr>
            <th></th>
            {if $rolUsuario eq 1}
                <th></th>
                <th></th>
            {/if}
            
        </tr>
    </thead>
    <tbody>
        {foreach from=$autores item=$autor}
            <tr>
                <td class="autorTd"><a href="autores/{$autor->id}/libros">{$autor->nombre}</a></td>
                {if $rolUsuario eq 1}
                    <td class="deleteBtnTd"><a href="autores/delete/{$autor->id}"><img src="img/delete.png"></a></td>
                    <td class="seeBtnTd"><a href="autores/{$autor->id}"><img src="img/eye.png"></a></td>
                {/if}
            </tr>
        {/foreach}
    </tbody>
</table>