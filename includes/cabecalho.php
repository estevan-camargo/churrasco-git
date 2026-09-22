<?php
require_once __DIR__ . '/verificar_login.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Churrasco Farroupilha</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <header>
        <h1>Churrasco da Semana Farroupilha</h1>
        <nav>
            <a href="../index.php">Início</a> | 
            <a href="../participantes/cadastrar.php">Nova Inscrição</a> | 
            <a href="../participantes/listar.php">Participantes</a> | 
            <a href="../auth/logout.php">Sair</a>
        </nav>
    </header>
    <hr>
    <main>