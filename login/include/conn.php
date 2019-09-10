<?php
$conn = new mysqli('monitomx.duckdns.org:3306', 'root', 'rosetyler', 'monito');
//comprobar conexion a la base de datos
// echo "<pre>";
//   var_dump($conn->ping());
// echo "</pre>";


/* comprobar la conexión */
// if ($conn->connect_errno) {
//   printf("Conexión fallida: %s\n", $conn->connect_error);
//   exit();
// }

// /* comprobar si el servidor sigue vivo */
// if ($conn->ping()) {
//   printf ("¡La conexión está bien!\n");
// } else {
//   printf ("Error: %s\n", $mysqli->error);
// }


//   if ($conn->connect_error) {
//     echo $conn->$connect_error;
//   }

$conn->set_charset('utf8');