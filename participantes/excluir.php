<?php
require_once '../includes/verificar_login.php';
require_once '../config/conexao.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $con->prepare("DELETE FROM participantes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: listar.php");
exit();
?>