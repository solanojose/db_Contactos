<?php
session_start();
include_once("conexion.php");

$id_contacto = $_GET['id_contacto'];
$id_usuario = $_SESSION['id_usuario'];

if (isset($_GET['id_contacto'])) {

    $consulta = "SELECT COUNT(*) as count FROM tcontactosxusuarios WHERE id = :id_contacto AND id_usuario = :id_usuario";
    $stmt_ = $conexion->prepare($consulta);
    $stmt_->bindParam(':id_contacto', $id_contacto, PDO::PARAM_INT);
    $stmt_->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt_->execute();
    $resultado = $stmt_->fetch(PDO::FETCH_ASSOC);

    if ($resultado['count'] > 0) {
        $sql = "DELETE FROM tcontactosxusuarios WHERE id = :id_contacto AND id_usuario = :id_usuario";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id_contacto', $id_contacto, PDO::PARAM_INT);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        
        try {
            $stmt->execute();
            echo "Contacto eliminado exitosamente!!";
            header('Location: listar_contactos.php');
            exit;
        } catch (PDOException $e) {
            echo "Error al eliminar contacto: " . $e->getMessage();
        }
    } else {
        echo "No tienes permiso, atrevid@.";
    }
} else {
    echo "Elija un contacto para eliminar.";
}
?>
