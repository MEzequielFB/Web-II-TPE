<div class="comentariosDiv" id="libroDiv{$libro->id}">    
    <div class="comentarioDiv" v-for="comentario in comentarios">
        {literal} <!--El tag literal de Smarty se usa para que no compile las llaves de Vue-->
            <h4>{{comentario.usuario}}</h4>
            <p>{{comentario.contenido}}</p>
            <p>Puntuación: {{comentario.puntuacion}}</p>
        {/literal}
        {if $rolUsuario eq 1}
            <img src="img/delete.png">
        {/if}        
    </div>    
</div>