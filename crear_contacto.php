<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header('Location: inicio_sesion.php');
}

include_once("conexion.php");

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$id_usuario = $_SESSION['id_usuario'];

# Insertar nuevo contacto en la base de datos asociándolo con el ID de usuario
$sql = "INSERT INTO tcontactosxusuarios (nombre, telefono, correo, id_usuario) VALUES (:nombre, :telefono, :correo, :id_usuario)";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
$stmt->bindParam(':telefono', $telefono, PDO::PARAM_INT);
$stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
$stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

try {
    $stmt->execute();
    echo "<script>alert ('Contacto agregado exitosamente.')</script>";
    # Redireccionar a la página listar contactos para ver los contactos después de agregarlo
    header('Location: listar_contactos.php');
} catch (PDOException $e) {
    echo "Error al agregar contacto: " . $e->getMessage();
}