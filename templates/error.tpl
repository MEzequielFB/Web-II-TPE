<!DOCTYPE html>
<html lang="en">
<head>
    {include file="headContent.tpl"}
</head>
<body>
{include file="navbar.tpl"}

<div class="errorDiv">
    <div class="alert alert-warning" role="alert">
        {$mensaje}
    </div>
    <a href="{$base_url}"></a>
</div>

{include file="footer.tpl"}