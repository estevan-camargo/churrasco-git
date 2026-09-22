<?php
require_once '../includes/verificar_login.php';
require_once '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['id'];
    $nome = $_POST['nome'] ?? '';
    $turma = $_POST['turma'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $tipo = $_POST['tipo_churrasco'] ?? '';
    $acompanhamento = $_POST['acompanhamento'] ?? '';
    $confirmado = (int)$_POST['confirmado'];
    $pago = (int)$_POST['pago'];

    $stmt = $con->prepare("UPDATE participantes SET nome=?, turma=?, telefone=?, tipo_churrasco=?, acompanhamento=?, confirmado=?, pago=? WHERE id=?");
    $stmt->bind_param("sssssiii", $nome, $turma, $telefone, $tipo, $acompanhamento, $confirmado, $pago, $id);

    if ($stmt->execute()) {
        header("Location: listar.php?msg=atualizado");
    } else {
        echo "Erro ao atualizar participante: " . $con->error;
    }
}
?>