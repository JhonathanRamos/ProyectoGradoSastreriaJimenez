<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión o registrarse</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar sesión</h2>
        <form action="procesar_login.php" method="post">
            <input class="login-input" type="text" name="username" placeholder="Nombre de usuario" required>
            <input class="login-input" type="password" name="password" placeholder="Contraseña" required>
            <button class="login-button" type="submit">Iniciar sesión</button>
        </form>
        <p>¿No tienes una cuenta? <a href="registro.php">Registrarse</a></p>
    </div>
</body>
</html>
