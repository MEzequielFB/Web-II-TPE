<div class="comentariosDiv" id="libroDiv{$libro->id}">    
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