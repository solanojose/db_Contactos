<?php
session_start();
# Conexión a la base de datos utilizando PDO
include_once("conexion.php");

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$id_usuario = $_SESSION['id_usuario'];

# Actualizar contacto en la base de datos asociándolo con el ID de usuario
$sql = "UPDATE tcontactosxusuarios SET nombre = :nombre, telefono = :telefono, correo = :correo WHERE id_usuario = :id_usuario";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
$stmt->bindParam(':telefono', $telefono, PDO::PARAM_INT);
$stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
$stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

try {
    $stmt->execute();
    echo "<script>alert ('Contacto actualizado exitosamente.')</script>";
    # Redireccionar a la página listar contactos para ver los contactos después de editar
    header('Location: listar_contactos.php');
} catch (PDOException $e) {
    echo "Error al editar contacto: " . $e->getMessage();
}
