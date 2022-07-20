<!DOCTYPE html>
<html lang="en">
<head>
    {include file="headContent.tpl"}    
</head>
<body>

<form class="registroForm" action="registro/verify" method="post">
    {if $errorMsj neq null}
        <div class="alert alert-danger" role="alert">
            {$errorMsj}
        </div>
    {/if}
    
    <div>
        <label for="nombreUsuarioInput" class="form-label labelForm">Ingrese un nombre de usuario</label>
        <input type="text" class="form-control" id="nombreUsuarioInput" name="nombreUsuarioInput" required>
    </div>
    <div>
        <label for="passwordInput" class="form-label labelForm">Ingrese una contraseña</label>
        <input type="password" class="form-control" id="passwordInput" name="passwordInput" minlength="6" maxlength="10" required>
    </div>
    <div>
        <label for="passwordRepeatInput" class="form-label labelForm">Repita la contraseña</label>
        <input type="password" class="form-control" id="passwordRepeatInput" name="passwordRepeatInput" minlength="6" maxlength="10" required>
    </div>

    <div class="loginRegistroDiv">
        <button class="btn btn-outline-secondary">Registrarse</button>
        <a href="login" class="loginLink">Volver al login</a>
    </div>      
</form>

{include file="footer.tpl"}