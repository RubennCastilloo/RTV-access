<?php
function obtenerUsuarios() {
    include 'conn.php';
    try {
        return $conn->query("SELECT id, nombre, apellido, usuario, tipo FROM usuarios");
    } catch (Exception $e) {
         echo "Error!" . $e->getMessage() . "<br>";
         return false;
    }
} 

function obtenerUsuario($id) {
    include 'conn.php';
    try {
         return $conn->query("SELECT id, nombre, apellido, usuario, password, tipo FROM usuarios WHERE id = $id");
    } catch (Exception $e) {
         echo "Error!" . $e->getMessage() . "<br>";
         return false;
    }
}