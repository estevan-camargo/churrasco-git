<?php
require_once '../includes/verificar_login.php';
require_once '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome           = isset($_POST['nome']) ? trim($_POST['nome']) : '';
    $turma          = isset($_POST['turma']) ? trim($_POST['turma']) : '';
    $telefone       = isset($_POST['telefone']) ? trim($_POST['telefone']) : '';
    $tipo_churrasco = isset($_POST['tipo_churrasco']) ? trim($_POST['tipo_churrasco']) : '';
    $acompanhamento = isset($_POST['acompanhamento']) ? trim($_POST['acompanhamento']) : '';
    $confirmado     = isset($_POST['confirmado']) ? (int)$_POST['confirmado'] : 0;
    $pago           = isset($_POST['pago']) ? (int)$_POST['pago'] : 0;

    if (!empty($nome) && !empty($turma) && !empty($tipo_churrasco)) {
        // Escape de strings para prevenir injeções de SQL
        $nomelindinho       = $con->real_escape_string($nome);
        $turmalindinha      = $con->real_escape_string($turma);
        $telefonelindinho   = $con->real_escape_string($telefone);
        $tipolindinho       = $con->real_escape_string($tipo_churrasco);
        $acompanhamentolindinho = $con->real_escape_string($acompanhamento);

        $sql = "INSERT INTO participantes (nome, turma, telefone, tipo_churrasco, acompanhamento, confirmado, pago) 
                VALUES ('$nomelindinho', '$turmalindinha', '$telefonelindinho', '$tipolindinho', '$acompanhamentolindinho', $confirmado, $pago)";

        if ($con->query($sql)) {
            $mensagem = "Inscrição realizada com sucesso!";
        } else {
            $mensagem = "Erro ao gravar os dados na tabela: " . $con->error;
        }
    } else {
        $mensagem = "Por favor, preencha todos os campos obrigatórios.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvar Inscrição</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <h2>Resultado do Cadastro</h2>
    <p><?= isset($mensagem) ? $mensagem : 'Acesso inválido' ?></p>
    <br>
    <a href="cadastrar.php">Efetuar nova inscrição</a>
    <br><br>
    <a href="../index.php">Voltar para a página inicial</a>  
</body>
</html>