<div class="comentariosDiv" id="libroDiv{$libro->id}">
    <button type="button" class="btn btn-dark sortPuntuacionBtn">Puntuación<img :src="icono" class="puntuacionImg hide"></button>
    <button type="button" class="btn btn-dark sortAntiguedadBtn">Antigüedad<img :src="icono" class="antiguedadImg hide"></button>
    <select class="form-select" name="puntuacionFilterSelect" id="puntuacionFilterSelect" required aria-label="Default select example">
        <option value="0">todos</option>
        <option value="1">Puntuación: 1</option>
        <option value="2">Puntuación: 2</option>
        <option value="3">Puntuación: 3</option>
        <option value="4">Puntuación: 4</option>
        <option value="5">Puntuación: 5</option>
    </select>
    <button type="button" class="btn btn-dark puntuacionFilterBtn">Filtrar por puntuación</button>
    <div class="comentarioDiv" v-for="comentario in comentarios">
        {literal} <!--El tag literal de Smarty se usa para que no compile las llaves de Vue-->
            <h4>{{comentario.usuario}}</h4>
            <p>{{comentario.contenido}}</p>
            <p>Puntuación: {{comentario.puntuacion}}</p>
        {/literal}
        {if $rolUsuario eq 1}
             {literal}
                <!--En el id se bindea el valor del id del comentario. Vue no permite esta sintaxis => id="{{comentario.id}}"-->
                <!--El comentario está entre literales porque Smarty compila las llaves-->
             {/literal}
            <img src="img/delete.png" class="comentarioDeleteBtn" :id="comentario.id">
        {/if}        
    </div>    
</div>