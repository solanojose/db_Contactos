<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header('Location: inicio_sesion.php');
}

include_once("conexion.php");
if(isset($_SESSION['id_usuario'])) {
    
    $id_usuario = $_SESSION['id_usuario'];

    $sql = "SELECT COUNT(*) as count FROM tcontactosxusuarios WHERE id_usuario = :id_usuario";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->execute();
    $validarNumContactos = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($validarNumContactos['count'] == 0) 
    {
        echo "No hay contactos registrados.";
        echo '<br/>';
        echo "<br/>";
        echo '<a href="formGuardarContacto.php">Agregar nuevo contacto</a>';  
    }
    else
    {

        $sql = "SELECT id, nombre, telefono, correo FROM tcontactosxusuarios WHERE id_usuario = :id_usuario";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        $contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $resultado = $contactos; 

        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>LISTA DE CONTACTOS</title>
        </head>
        <body>
       
            <h1>Contactos Registrados</h1>
            <table>
                <tr>
                    <th>NOMBRE</th>
                    <th>TELEFONO</th>
                    <th>CORREO</th>
                </tr>
                <?php foreach ($resultado as $contacto): ?>
                <tr>
                <td><?php echo $contacto['nombre']; ?></td> -->
                    <td><?php echo $contacto['telefono']; ?></td>
                    <td><?php echo $contacto['correo']; ?></td>
                    <td>
                    <a href="formEditarContacto.php?id_contacto=<?php echo $contacto['id']; ?>">Editar</a>
                    <a href="eliminarContacto.php?id_contacto=<?php echo $contacto['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este contacto?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

            <br/>
            <a href="formGuardarContacto.php">Agregar nuevo contacto</a>  
            <br/>
            <a href="cerrarSesion.php">Cerrar sesión</a>
            <br/>
            <a href="formRecuperarSesion.php">Bloquear sesión</a>
            <br/>
           

        </body>
        </html>
        <?php
    }
}
else {
    header('Location: index.php');   
}
?>
