<?php
require_once 'includes/verificar_login.php';
require_once 'config/conexao.php';

// Cálculos baseados nos registos da base de dados
$resTotal = $con->query("SELECT COUNT(*) as total FROM participantes")->fetch_assoc();
$resConf = $con->query("SELECT COUNT(*) as total FROM participantes WHERE confirmado = 1")->fetch_assoc();
$resNaoConf = $con->query("SELECT COUNT(*) as total FROM participantes WHERE confirmado = 0")->fetch_assoc();
$resPago = $con->query("SELECT COUNT(*) as total FROM participantes WHERE pago = 1")->fetch_assoc();
$resNaoPago = $con->query("SELECT COUNT(*) as total FROM participantes WHERE pago = 0")->fetch_assoc();
$resTrad = $con->query("SELECT COUNT(*) as total FROM participantes WHERE tipo_churrasco = 'Tradicional'")->fetch_assoc();
$resVeg = $con->query("SELECT COUNT(*) as total FROM participantes WHERE tipo_churrasco = 'Vegetariano'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumo - Churrasco da Semana Farroupilha</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>CHURRASCO DA SEMANA FARROUPILHA</h1>
    <p>Bem-vindo ao sistema, <?php echo htmlspecialchars($_SESSION['usuario']); ?></p>
    
    <hr>
    
    <p>Total de inscritos: <?= $resTotal['total'] ?></p>
    <br>
    <p>Confirmados: <?= $resConf['total'] ?></p>
    <p>Não confirmados: <?= $resNaoConf['total'] ?></p>
    <br>
    <p>Pagamentos realizados: <?= $resPago['total'] ?></p>
    <p>Pagamentos pendentes: <?= $resNaoPago['total'] ?></p>
    <br>
    <p>Churrasco tradicional: <?= $resTrad['total'] ?></p>
    <p>Vegetariano: <?= $resVeg['total'] ?></p>

    <hr>

    <ul>
        <li><a href="participantes/cadastrar.php">Nova inscrição</a></li>
        <li><a href="participantes/listar.php">Participantes</a></li>
        <li><a href="auth/logout.php">Sair</a></li>
    </ul>
</body>
</html>