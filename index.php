<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIAR SESION</title>
</head>
<body>

    <!-- Formulario para agregar un nuevo contacto -->
    <h2>Iniciar sesion</h2>
    <form action="iniciarSesion.php" method="POST">
     Nombre de usuario: <input type="text" name="nombreUsuario" placeholder="Nombre de usuario" required>
        <br/>
        <br/>
     Contraseña: <input type="password" name="contraseña" placeholder="Contraseña" required>
        <br/>
        <br/>
        <input type="submit" name="btnLogin" value="Iniciar Sesion"></input>
        <br/>
        <br/>
        ¿Aun no te encuentras registrado? <br/>
        <a href="formRegistroUsuario.php">Registrate aqui</a>
    </form>
</body>
</html>


