<?php
include 'bd.php';

$id = $_GET['id'];
$conexion = conectar();
$result = pg_query_params($conexion, "DELETE FROM usuarios WHERE id = $1", [$id]);
pg_close($conexion);

header('Location: index.php');
exit;
?>