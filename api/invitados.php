<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

include "../conexion.php"; // Ajusta según tu estructura

// Parámetros de búsqueda/filtro
$asistira = isset($_GET['asistira']) ? intval($_GET['asistira']) : null;
$nombre   = isset($_GET['nombre']) ? $conn->real_escape_string($_GET['nombre']) : null;
$page     = isset($_GET['page']) ? max(intval($_GET['page']), 1) : 1;
$limit    = isset($_GET['limit']) ? max(intval($_GET['limit']), 1) : 20;
$offset   = ($page - 1) * $limit;

// Construir consulta
$sql = "SELECT id, nombre, edad, asistira, imagen FROM invitados WHERE 1=1";

if ($asistira !== null) {
    $sql .= " AND asistira = $asistira";
}

if ($nombre) {
    $sql .= " AND nombre LIKE '%$nombre%'";
}

// Contar total de resultados para paginación
$countResult = $conn->query("SELECT COUNT(*) as total FROM ($sql) as temp");
$total = $countResult->fetch_assoc()['total'];

// Agregar orden y límite
$sql .= " ORDER BY id DESC LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);

$invitados = [];
while($row = $result->fetch_assoc()){
    $row['imagen_url'] = $row['imagen'] ? "http://tu-dominio.com/imagenes/".$row['imagen'] : null;
    $invitados[] = $row;
}

// Devolver JSON
echo json_encode([
    "status" => "success",
    "total"  => intval($total),
    "page"   => $page,
    "limit"  => $limit,
    "data"   => $invitados
]);
?>
