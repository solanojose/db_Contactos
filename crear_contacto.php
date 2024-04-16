<?php
# Conexión a la base de datos utilizando PDO
include_once("conexion.php");

# Recibir datos del formulario
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

# Insertar nuevo contacto en la base de datos
$sql = "INSERT INTO contactos (nombre, telefono, correo) VALUES (:nombre, :telefono, :correo)";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
$stmt->bindParam(':telefono',$telefono, PDO::PARAM_INT);
$stmt->bindParam(':correo', $correo, PDO::PARAM_STR);

try {
    $stmt->execute();
    echo "<script>alert ('Contacto agregado exitosamente.')</script>";
    # Redireccionar a la página listar contactos para ver los contactos después de agregarlo
    header('Location: listar_contactos.php');
} catch (PDOException $e) {
    echo "Error al agregar contacto: " . $e->getMessage();
}