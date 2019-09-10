<?php
    include 'login/include/sesiones.php';
    include 'layout/header.php';
    include 'layout/nav-user.php';
?>

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