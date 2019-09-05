<?php
    include 'login/include/sesiones.php';
    include 'layout/header.php';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="access.php"><i class="fas fa-tv"></i> <i class="fas fa-grip-lines-vertical"></i> <i class="fas fa-broadcast-tower"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      
      
    
    </ul>
    <ul class="nav">
      
      <li class="btn">
        <a class="btn btn-info" href="login/index.php?cerrar_sesion=true">
          Cerrar Sesión
        </a>
      </li> 
    
    </ul>
  </div>
</nav>

<div class="table-bootstrap table-responsive-xl">


<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th scope="col"><i class="fas fa-tv"></i>  TV</th>
      <th scope="col"><i class="fas fa-broadcast-tower"></i>  Radio</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a class="text-info" href="tvchih.php" target="_blank">TV Chihuahua</a></td>  
      <td><a class="text-info" href="radiostream.php" target="_blank">Radio Streaming</a></td>
    </tr>
    <tr>
      <td><a class="text-info" href="tvjuarez.php" target="_blank">TV Juárez</a></td>
      <td><a class="text-info" href="radiochih.php" target="_blank">Radio Chihuahua</a></td>
    </tr>
  </tbody>
</table>


</div>

<?php
    include 'layout/footer.php';
?>