<!DOCTYPE html>
<html lang="en">
<head>
    {include file="headContent.tpl"}    
</head>
<body>

<form class="loginForm" action="login/verify" method="post">
    {if $errorMsj neq null}
        <div class="alert alert-danger" role="alert">
            {$errorMsj}
        </div>
    {/if}
    
    <div>
        <label for="nombreUsuarioInput" class="form-label labelForm">Nombre de usuario</label>
        <input type="text" class="form-control" id="nombreUsuarioInput" name="nombreUsuarioInput" required>
    </div>
    <div>
        <label for="passwordInput" class="form-label labelForm">Contraseña</label>
        <input type="password" class="form-control" id="passwordInput" name="passwordInput" minlength="6" maxlength="10" required>
    </div>

    <button class="btn btn-outline-secondary">Iniciar sesión</button>
</form>

{include file="footer.tpl"}