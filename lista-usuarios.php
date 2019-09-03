<?php
    include 'login/include/sesiones.php';
    include 'layout/header.php';
    include 'layout/nav.php';
    include 'include/funciones.php';
?>

<div class="container mt-5 pt-5">
<h2 class="row justify-content-center mb-4">Lista de Usuarios</h2>
<table class="table table-striped justify-content-center listado-usuarios">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Usuario</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php $usuarios = obtenerUsuarios();
    if ($usuarios->num_rows) {
      foreach($usuarios as $usuario) { ?>
    <tr>
      <th><?php echo $usuario['id']; ?></th>
      <td><?php echo $usuario['nombre']; ?></td>
      <td><?php echo $usuario['apellido']; ?></td>
      <td><?php echo $usuario['usuario']; ?></td>
      <td>
        <a href="editar-usuario.php?id=<?php echo $usuario['id']; ?>" class="btn btn-info">
              <i class="fas fa-pen"></i>
        </a>
        <button data-id="<?php echo $usuario['id']; ?>" type="button" class="btn btn-info borrar">
             <i class="fas fa-trash"></i>
       </button>
      </td>
   </tr> <?php
  }
}
?>
  </tbody>
</table>
</div>





<?php
    include 'layout/footer.php';
?>