<?php
include 'bd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conexion = conectar();
    
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $id = $_POST['id'] ?? null;
    
    if ($id) {
        $query = "UPDATE usuarios SET nombre=$1, email=$2, telefono=$3 WHERE id=$4";
        $result = pg_query_params($conexion, $query, [$nombre, $email, $telefono, $id]);
    } else {
        $query = "INSERT INTO usuarios (nombre, email, telefono) VALUES ($1, $2, $3)";
        $result = pg_query_params($conexion, $query, [$nombre, $email, $telefono]);
    }
    pg_close($conexion);
}

header('Location: index.php');
exit;
?>