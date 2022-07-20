<table class="table table-dark table-striped table-bordered usuariosTabla">
    <thead>
        <th>Nombre de usuario</th>
        <th>Permisos</th>
        <th class="permisosTh"></th>
    </thead>
    <tbody>
        {foreach from=$usuarios item=$usuario}
            {if $usuario->nombre neq $nombreUsuario}
                <tr>
                    <td>{$usuario->nombre}</td>
                    <td>{$usuario->rol}</td>
                    {if $usuario->rol eq "Administrador"}
                        <td class="permisosTd"><a href="usuarios/{$usuario->id}/permisos"><button type="button" class="btn btn-secondary">Quitar permisos</button></a></td>
                    {else}
                        <td class="permisosTd"><a href="usuarios/{$usuario->id}/permisos"><button type="button" class="btn btn-secondary">Dar permisos</button></a></td>
                    {/if}
                </tr>
            {/if}            
        {/foreach}
    </tbody>
</table>