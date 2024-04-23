<?php
session_start();
include_once("conexion.php");

$id_contacto = $_GET['id_contacto'];
$id_usuario = $_SESSION['id_usuario'];

if (isset($_GET['id_contacto']) && isset($_SESSION['id_usuario'])) {
    $sql = "SELECT nombre, telefono, correo FROM tcontactosxusuarios WHERE id = :id_contacto AND id_usuario = :id_usuario";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id_contacto', $id_contacto, PDO::PARAM_INT);
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
 
        $nombre = $resultado['nombre'];
        $telefono = $resultado['telefono'];
        $correo = $resultado['correo'];
    } else {
        echo "No hay contactos!!.";       
    }
} 
?>

<?php 
if (isset($_GET['id_contacto'])) {
    $idContacto = $_GET['id_contacto'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR CONTACTO</title>
</head>
<body>

    <!-- Formulario para agregar un nuevo contacto -->
    <h2>EDITAR CONTACTO</h2> 
    <form action="editarContacto.php" method="POST">

        <input type="hidden" name="id_contacto" value="<?php echo $idContacto; ?>">
        Nombre del contacto: <input type="text" name="nombre" value="<?php echo $nombre; ?>" placeholder="Ingresa el nombre" required>
        <br/>
        <br/>
        Numero de telefono: <input type="tel" name="telefono" value="<?php echo $telefono; ?>" placeholder="Número de telefono" required>
        <br/>
        <br/>
        Correo: <input type="email" name="correo" value="<?php echo $correo; ?>" placeholder="Correo" required>
        <br/>
        <br/>
        <input type="submit" name="btnEditar" value="Editar Contacto"></input>
    </form>

    <?php
    } else {
        echo "Elija un contacto para editar.";
    }
    ?>
</body>
</html>
