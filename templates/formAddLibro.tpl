<!--<form action="libros/add" method="post" class="addLibroForm">
    <label for="tituloInput">Título: </label>
    <input type="text" name="tituloInput" id="tituloInput" required>

    <label for="generoInput">Género: </label>
    <input type="text" name="generoInput" id="generoInput" required>

    <div class="autorFechaDiv">
        <label for="autorSelect">Autor: </label>
        <select name="autorSelect" id="autorSelect">
            {foreach from=$autores item=$autor}
                <option value="{$autor->id}">{$autor->nombre}</option>
            {/foreach}
        </select>
        
        <label for="fechaInput">Fecha de publicación: </label>
        <input type="date" name="fechaInput" id="fechaInput">
    </div>
    <button>Agregar libro</button>
</form>-->

<form action="libros/add" method="post" class="addLibroForm">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="tituloInput" id="tituloInput" required placeholder="Título">
        <label for="tituloInput">Título</label>
    </div>

    <div class="form-floating">
        <input type="text" class="form-control" name="generoInput" id="generoInput" required placeholder="Género">
        <label for="generoInput">Género</label>
    </div>

    <select class="form-select" name="autorSelect" id="autorSelect" required aria-label="Default select example">
        <option value="noAutor" selected>Elija un autor</option>
        {foreach from=$autores item=$autor}
            <option value="{$autor->id}">{$autor->nombre}</option>
        {/foreach}
    </select>
    <div class="alert alert-danger alertaSelect hide" role="alert">
        
    </div>

    <label for="fechaInput" class="labelForm">Fecha de publicación: </label>
    <input type="date" name="fechaInput" id="fechaInput" required>

    <button class="btn btn-outline-secondary" id="button-addon1">Agregar libro</button>
</form>