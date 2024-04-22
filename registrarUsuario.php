<?php
include_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_nombres = $_POST['nombres'];
    $_nombreUsuario = $_POST['nombreUsuario'];
    $_clave = $_POST['contraseña'];

    // Validar si el nombre de usuario ya está en uso
    $sql = "SELECT COUNT(*) as count FROM tusuarios WHERE nombreUsuario = :nombreUsuario";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombreUsuario', $_nombreUsuario, PDO::PARAM_STR);
    $stmt->execute();
    $validarNomUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($validarNomUsuario['count'] > 0) {
        echo "El nombre de usuario ya está en uso!!";
    } else {
        // Insertar nuevo usuario en la base de datos
        $sql_i= "INSERT INTO tusuarios (nombre, nombreUsuario, clave) VALUES (:nombres, :nombreUsuario, :clave)";
        $stmt_i = $conexion->prepare($sql_i);
        $stmt_i->bindParam(':nombres', $_nombres, PDO::PARAM_STR);
        $stmt_i->bindParam(':nombreUsuario', $_nombreUsuario, PDO::PARAM_STR);
        $stmt_i->bindParam(':clave', $_clave, PDO::PARAM_STR);
        
        try {
            $stmt_i->execute();
            echo "Usuario registrado exitosamente!!";
            echo "<br/>";
            echo '<a href="index.php">Inicio</a>';  
            # header('Location: index.php');
        } catch (PDOException $e) {
            echo "Error al guardar usuario: " . $e->getMessage();
        }
    }
}
?>