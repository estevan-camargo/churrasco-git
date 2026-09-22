<?php
session_start();
if (isset($_SESSION['autorizado']) && $_SESSION['autorizado'] === true) {
    header("Location: ../index.php");
    exit();
}

$erro = isset($_GET['erro']) ? 'E-mail ou palavra-passe incorretos' : '';
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Churrasco</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <h2>Acesso ao Sistema</h2>
    
    <?php if (!empty($erro)): ?>
        <p style="color: red;"><?php echo $erro; ?></p>
    <?php endif; ?>

    <form action="autenticar.php" method="post">
        <label for="email">E-mail:</label><br>
        <input type="text" name="email" id="email" placeholder="Digite o seu e-mail" required>
        
        <label for="senha">Palavra-passe:</label><br>
        <input type="password" name="senha" id="senha" placeholder="Digite a sua palavra-passe" required>
        
        <input type="submit" value="Entrar">
    </form>
</body>
</html>