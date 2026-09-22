<?php
session_start();
if (isset($_SESSION['autorizado']) && $_SESSION['autorizado'] === true) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Churrasco</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <h2>Acesso ao Sistema</h2>
    <?php if (isset($_GET['erro'])): ?>
        <p style="color: red;">E-mail ou senha incorretos!</p>
    <?php endif; ?>
    <form action="autenticar.php" method="POST">
        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>
        
        <button type="submit">Entrar</button>
    </form>
</body>
</html>