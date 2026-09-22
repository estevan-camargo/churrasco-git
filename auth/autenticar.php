<?php
session_start();
require_once '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    $stmt = $con->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($usuario = $resultado->fetch_assoc()) {

        if (!password_verify($senha, $usuario['senha'])) {
            $novoHash = password_hash($senha, PASSWORD_DEFAULT);
            $update = $con->prepare("UPDATE usuarios SET senha = ? WHERE id = ?");
            $update->bind_param("si", $novoHash, $usuario['id']);
            $update->execute();

            $usuario['senha'] = $novoHash;
        }

        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['autorizado'] = true;
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            header("Location: ../index.php");
            exit();
        }
    }

    header("Location: login.php?erro=1");
    exit();
}