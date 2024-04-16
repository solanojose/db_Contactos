<?php
# Conexión a la base de datos utilizando PDO
include_once("conexion.php");

# Recibir datos del formulario
$_nombres = $_POST['nombres'];
$_nombre_usuario = $_POST['nombreUsuario'];
$_clave = $_POST['contraseña'];


# Insertar nuevo contacto en la base de datos
$sql = "INSERT INTO usuarios (nombres, nombreUsuario, clave) VALUES (:nombres, :nombreUsuario, :clave)";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':nombres', $_nombres, PDO::PARAM_STR);
$stmt->bindParam(':nombreUsuario',$_nombre_usuario, PDO::PARAM_STR);
$stmt->bindParam(':clave', $_clave, PDO::PARAM_STR);

try {
    $stmt->execute();
    echo "<script>alert ('Usuario registrado exitosamente.')</script>";
    # Redireccionar a la página listar contactos para ver los contactos después de agregarlo
     header('Location: index.php');
} catch (PDOException $e) {
    echo "Error al guardar usuario: " . $e->getMessage();
}
