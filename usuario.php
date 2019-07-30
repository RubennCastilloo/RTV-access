<?php
    include 'layout/header.php';
    include 'layout/nav.php';
?>
<div class="container">
<h2 class="row justify-content-center mt-4">Agregar Usuario</h2>

<form class="needs-validation formulario-usuario " novalidate id="formulario-usuario">
<div class="form-row">

<div class="col-md-4 mb-3">
  <label for="nombre">Nombre</label>
  <input type="text" class="form-control ingresarNombre" id="nombre" placeholder="Nombre"  required>
  <div class="valid-feedback">
    Correcto!
  </div>
</div>
<div class="col-md-4 mb-3">
  <label for="apellido">Apellido</label>
  <input type="text" class="form-control ingresarApellido" id="apellido" placeholder="Apellido"  required>
  <div class="valid-feedback">
    Correcto!
  </div>
</div>

<div class="col-md-4 mb-3">
  <label for="usuario">Usuario</label>
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text" id="usario">@</span>
    </div>
    <input type="text" class="form-control ingresarUsuario" id="usuario" placeholder="Usuario" aria-describedby="inputGroupPrepend" required>
    <div class="invalid-feedback">
      Porfavor elija un nombre de usuario.
    </div>
  </div>
</div>
<div class="col-md-4 mb-3">
  <label for="password">Password</label>
  <input type="password" class="form-control ingresarApellido" id="password" placeholder="Password"  required>
  <div class="valid-feedback">
    Correcto!
  </div>
</div>
<div class="col-md-4 mb-3">
    
  <label for="usuarioTipo">Tipo de usuario</label>
    <select class="custom-select ingresarEmpresa" id="usuarioTipo">
      <option  value="">Seleccionar</option>
      <option value="admin">Administrador</option>
      <option value="gen">General</option>
    </select>
</div>
</div>
<button type="button" class="btn btn-info" id="registrarUsuario">Registrar Usuario</button>
</form>
</div>






</div>




<?php
    include 'layout/footer.php';
?>