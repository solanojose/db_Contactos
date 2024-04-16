<?php
include_once("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnLogin']) && $_POST['btnLogin'] === 'Iniciar Sesion') {
   
    $usuario = $_POST['nombreUsuario'];
    $clave = $_POST['contraseña'];

    
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE nombreUsuario = :usuario AND clave = :clave");
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':clave', $clave);
    $stmt->execute();

   
    if ($stmt->rowCount() > 0) {
        session_start();
        echo "Hola " . $usuario;
        header('Location: listar_contactos.php');
        exit;
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}

