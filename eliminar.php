<?php
include "conexion.php";

// Recibir ID del invitado a eliminar
$id = $_POST['id'] ?? 0;

if($id > 0){
    // Eliminar de la tabla
    $sql = "DELETE FROM invitados WHERE id = $id";
    if($conn->query($sql)){
        echo "ELIMINADO OK";
    } else {
        echo "ERROR SQL: " . $conn->error;
    }
} else {
    echo "ID inválido";
}
exit;
?>
