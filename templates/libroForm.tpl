<form action="libros/{$metodo}" method="post" class="{$metodo}LibroForm">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="tituloInput" id="tituloInput" required placeholder="Título"
        {if $metodo eq "edit"}
            value="{$libro->titulo}"
        {/if}
        >
        <label for="tituloInput">Título</label>
    </div>

    <div class="form-floating">
        <input type="text" class="form-control" name="generoInput" id="generoInput" required placeholder="Género"
        {if $metodo eq "edit"}
            value="{$libro->genero}"
        {/if}
        >
        <label for="generoInput">Género</label>
    </div>

    <select class="form-select" name="autorSelect" id="autorSelect" required aria-label="Default select example">
        <option value="noAutor">Elija un autor</option>
        {foreach from=$autores item=$autor}

            {if $metodo eq "edit" && $libro->id_autor eq $autor->id}
                <option value="{$autor->id}" selected>{$autor->nombre}</option>
            {else}
                <option value="{$autor->id}">{$autor->nombre}</option>
            {/if}            
        {/foreach}
    </select>
    <div class="alert alert-danger alertaSelect hide" role="alert">
        
    </div>

    <label for="fechaInput" class="labelForm">Fecha de publicación: </label>
    <input type="date" name="fechaInput" id="fechaInput" required
    {if $metodo eq "edit"}
        value="{$libro->fecha_publicacion}"
    {/if}
    >

    <button class="btn btn-outline-secondary" id="button-addon1">Agregar libro</button>
</form>