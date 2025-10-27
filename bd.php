<?php
function conectar() {
    $conexion = pg_connect("host=localhost port=5432 dbname=crud_app user=postgres password=123");
    if (!$conexion) {
        die("Algo anda mal" . pg_last_error());
    }
    return $conexion;
}
?>