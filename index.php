<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro SanPablo</title>
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
          <a class="nav-link" href="registro_profesores.php">Profesores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registro_estudiantes.php">Estudiantes</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container my-5 flex-grow-1 text-center">
    <h1 class="mb-4">Bienvenido a SanPablo</h1>
    <p class="mb-4">Seleccione la sección para registrar información.</p>
    <a href="registro_profesores.php" class="btn btn-lg btn-light m-2 text-primary">Profesores</a>
    <a href="registro_estudiantes.php" class="btn btn-lg btn-light m-2 text-success">Estudiantes</a>
</div>

<footer class="text-center py-3 bg-light">
  &copy; <?= date('Y'); ?> SanPablo
</footer>

<script src="bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>