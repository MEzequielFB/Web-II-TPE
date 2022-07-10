<!DOCTYPE html>
<html lang="en">
<head>
    {include file="headContent.tpl"}
</head>
<body>
{include file="navbar.tpl"}

<h1>Libros de {$autor->nombre}</h1>
{include file="librosTabla.tpl"}

{include file="footer.tpl"}