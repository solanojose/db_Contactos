<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO DE USUARIO</title>
</head>
<body>

    <!-- Formulario para agregar un nuevo contacto -->
    <h2>Registrar Usuario</h2>
    <form action="registrarUsuario.php" method="POST">
     Nombres:           <input type="text" name="nombres" placeholder="Nombre completo" required>
        <br/>
        <br/>
     Nombre de usuario: <input type="text" name="nombreUsuario" placeholder="Nombre de usuario" required>
        <br/>
        <br/>
     Contraseña:        <input type="password" name="contraseña" placeholder="Contraseña" required>
        <br/>
        <br/>
        <input type="submit" value="Registrar"></input>
    </form>
</body>
</html>