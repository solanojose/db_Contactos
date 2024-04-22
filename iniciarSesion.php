<?php
include_once("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnLogin']) && $_POST['btnLogin'] === 'Iniciar Sesion') {
    $usuario = $_POST['nombreUsuario'];
    $clave = $_POST['contraseña'];

    $stmt = $conexion->prepare("SELECT id, nombreUsuario, clave FROM tusuarios WHERE nombreUsuario = :usuario");
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {       
        $datos = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($clave === $datos['clave']) {
            session_start();
            $_SESSION['id_usuario'] = $datos['id'];
            echo "Hola " . $usuario;
            header('Location: listar_contactos.php');
            exit;
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    } else {
        echo "Usuario no registrado.";
        echo "<br/>";
        echo "<br/>";
        echo '<a href="formRegistroUsuario.php">Registrate Aqui</a>'; 
    }
}
