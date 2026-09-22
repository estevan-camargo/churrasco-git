<?php
require_once '../includes/verificar_login.php';
require_once '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $turma = $_POST['turma'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $tipo = $_POST['tipo_churrasco'] ?? '';
    $acompanhamento = $_POST['acompanhamento'] ?? '';
    $confirmado = isset($_POST['confirmado']) ? (int)$_POST['confirmado'] : 0;
    $pago = isset($_POST['pago']) ? (int)$_POST['pago'] : 0;

    $stmt = $con->prepare("INSERT INTO participantes (nome, turma, telefone, tipo_churrasco, acompanhamento, confirmado, pago) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssii", $nome, $turma, $telefone, $tipo, $acompanhamento, $confirmado, $pago);

    if ($stmt->execute()) {
        header("Location: listar.php?msg=sucesso");
    } else {
        echo "Erro ao cadastrar participante: " . $con->error;
    }
}
?>