<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header('Location: inicio_sesion.php');
}

include_once("conexion.php");

$id_contacto = $_POST['id_contacto'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$id_usuario = $_SESSION['id_usuario'];


$sql = "UPDATE tcontactosxusuarios SET nombre = :nombre, telefono = :telefono, correo = :correo 
WHERE id = :id_contacto AND id_usuario = :id_usuario";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
$stmt->bindParam(':telefono', $telefono, PDO::PARAM_INT);
$stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
$stmt->bindParam(':id_contacto', $id_contacto, PDO::PARAM_INT);
$stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

try {
    $stmt->execute();
    echo "Contacto actualizado exitosamente!!";
    header('Location: listar_contactos.php');
} catch (PDOException $e) {
    echo "Error al editar contacto: " . $e->getMessage();
}
