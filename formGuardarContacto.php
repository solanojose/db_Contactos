<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR CONTACTO</title>
</head>
<body>

    <!-- Formulario para agregar un nuevo contacto -->
    <h2>GUARDAR CONTACTO</h2> 
    <form action="crear_contacto.php" method="POST">
        Nombre del contacto: <input type="text" name="nombre" placeholder="Ingresa el nombre" required>
        <br/>
        <br/>
        Numero de telefono: <input type="tel" name="telefono" placeholder="Número de telefono" required>
        <br/>
        <br/>
        Correo: <input type="email" name="correo" placeholder="Correo" required>
        <br/>
        <br/>
        <input type="submit" value="Guardar Contacto"></input>
    </form>
</body>
</html>
