<?php
// Cargar configuración de la base de datos
require_once __DIR__ . '/config.php';

// alert JavaScript to render after page
$alertJs = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre        = $conn->real_escape_string($_POST['nombre']);
  $cedula        = $conn->real_escape_string($_POST['cedula']);
  $direccion     = $conn->real_escape_string($_POST['direccion']);
  $telefono      = $conn->real_escape_string($_POST['telefono']);
  $fechaIngreso  = $conn->real_escape_string($_POST['fecha_ingreso']);

  // las columnas son: nombre, cedula, direccion, telefono, fechaIngreso
  $sql = "INSERT INTO profesores (nombre, cedula, direccion, telefono, fechaIngreso) VALUES ('$nombre', '$cedula', '$direccion', '$telefono', '$fechaIngreso')";

  if ($conn->query($sql) === TRUE) {
    $alertJs = "Swal.fire({icon:'success',title:'Guardado',text:'Registro de profesor exitoso.',confirmButtonText:'Aceptar'})"
             . ".then(function(){window.location.href='index.php';});";
  } else {
    $err = addslashes($conn->error);
    $alertJs = "Swal.fire({icon:'error',title:'Error',text:'Error: $err'});";
  }
} 
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Profesores</title>
  <link rel="stylesheet" href="bootstrap-5.2.3-dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">SanPablo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="registro_profesores.php">Profesores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registro_estudiantes.php">Estudiantes</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-5 flex-grow-1">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Registro de Profesores</h2>


            <form method="post" action="">
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
              </div>
              <div class="mb-3">
                <label for="cedula" class="form-label">Cédula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" required>
              </div>
              <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
              </div>
              <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
              </div>
              <div class="mb-3">
                <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
                <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" required>
              </div>
              <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="index.php" class="btn btn-secondary">Volver</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="text-center py-3 bg-light">
    &copy; <?= date('Y'); ?> SanPablo
  </footer>
  <script src="bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 globally available -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php if (
        isset($alertJs) &&
        trim($alertJs) !== ''
    ) : ?>
    <script>
      <?= $alertJs ?>
    </script>
  <?php endif; ?>
</body>

</html>