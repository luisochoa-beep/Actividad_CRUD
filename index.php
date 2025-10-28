<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PostgreSQL</title>
    <link rel="stylesheet" href="estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Gestión de Usuarios</h2>
        
        <!-- Formulario -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="guardar.php" method="POST">
                    <input type="hidden" name="id" id="userId">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="col-md-4">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="telefono" class="form-control" placeholder="Teléfono">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">Guardar Usuario</button>
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabla -->
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'bd.php';
                $conexion = conectar();
                $result = pg_query($conexion, "SELECT * FROM usuarios ORDER BY id DESC");
                
                while ($usuario = pg_fetch_assoc($result)) {
                    echo "
                    <tr>
                        <td>{$usuario['id']}</td>
                        <td>{$usuario['nombre']}</td>
                        <td>{$usuario['email']}</td>
                        <td>{$usuario['telefono']}</td>
                        <td>
                            <a href='editar.php?id={$usuario['id']}' class='btn btn-warning btn-sm'>Editar</a>
                            <a href='borrar.php?id={$usuario['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro?\")'>Eliminar</a>
                        </td>
                    </tr>";
                }
                pg_close($conexion);
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>