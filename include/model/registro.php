<?php 

$nombreUsuario = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$apellidoUsuario = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
$usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
$passwordUsuario = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$tipoUsuario = filter_var($_POST['tipo'], FILTER_SANITIZE_STRING);

include '../conn.php';



    $stmt = $conn->prepare("SELECT id, nombre, apellido, usuario, password FROM usuarios WHERE usuario = ?");
    $stmt->bind_param('s', $usuario);
    $stmt->execute();
    $stmt->bind_result($id_usuario, $nombre_usuario, $apellido_usuario, $usuario_db, $password_usuario);
    $stmt->fetch();
        if ($usuario_db) {
            $respuesta = array(
                'respuesta' => 'existe',
                'usuario_db' => $usuario_db
            );
        } 
        else {
            include '../conn.php';

            $opciones = array(
                'cost' => 12
            );
            
            $hash_pass = password_hash($passwordUsuario, PASSWORD_BCRYPT, $opciones);

            try {
                $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, usuario, password, tipo) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param('sssss', $nombreUsuario, $apellidoUsuario, $usuario, $hash_pass, $tipoUsuario);
                $stmt->execute();
                if ($stmt->affected_rows > 0) {
                    $respuesta = array(
                        'respuesta' => 'correcto'
                    );
                } else {
                    $respuesta = array(
                        'respuesta' => 'error'
                    );

                }
                $stmt->close();
                $conn->close();
            } catch (Exception $e) {
                $respuesta = array(
                    'error' => $e->getMessage()
                );
            }

}

echo json_encode($respuesta);

