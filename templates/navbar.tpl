<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" id="navbarLogo" href="{$base_url}">LibrosInfo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{$base_url}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="autores">Autores</a>
        </li>        
      </ul>
    </div>
    <div class="btn-group dropstart opcionesNavbar">
      <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        {$nombreUsuario}
      </button>
      <ul class="dropdown-menu opcionesMenu">
        <li><a class="dropdown-item" href="#">Editar perfil</a></li>
        {if $rolUsuario}
          <li><a class="dropdown-item" href="usuarios">Gestionar usuarios</a></li>
        {/if}        
        <li><a class="dropdown-item" href="#">Link</a></li>
      </ul>
    </div>
    <a href="logout"><button type="button" class="btn btn-secondary">Cerrar sesión</button></a>
  </div>
</nav>