<?php
include 'bd.php';

$id = $_GET['id'];
$conexion = conectar();
$result = pg_query_params($conexion, "SELECT * FROM usuarios WHERE id = $1", [$id]);
$usuario = pg_fetch_assoc($result);
pg_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Editar Usuario</h2>
        
        <div class="card">
            <div class="card-body">
                <form action="guardar.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" name="nombre" class="form-control" value="<?php echo $usuario['nombre']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <input type="email" name="email" class="form-control" value="<?php echo $usuario['email']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="telefono" class="form-control" value="<?php echo $usuario['telefono']; ?>">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">Actualizar Usuario</button>
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>