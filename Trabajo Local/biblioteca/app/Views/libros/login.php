<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión o registrarse</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h2 class="text-center">Iniciar sesión</h2>
        </div>
        <div class="card-body">
          <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
              <?= session()->getFlashdata('error') ?>
            </div>
          <?php endif; ?>

          <form action="<?= base_url('usuarios/inicioSesion') ?>" method="post">
            <div class="form-group" id="nombre">
              <label for="nombre_usuario">Nombre de usuario:</label>
              <input type="text" class="form-control" name="nombre_usuario" value="<?= old('nombre_usuario') ?>" required>
            </div>
            <br>
            <div class="form-group" id="contra">
              <label for="contrasena">Contraseña:</label>
              <input type="password" class="form-control" name="contrasena" required>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" style="font-family: Forte">Iniciar sesión</button>
            </div>
          </form>
        </div>
        <div class="card-footer text-center" style="font: oblique 100% cursive">
          ¿No tienes una cuenta? <a href="<?= base_url('libros/register') ?>" style="font-family: Forte">Regístrate</a>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>


</body>
</html>

