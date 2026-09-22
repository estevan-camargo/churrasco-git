<?php
session_start();
require_once '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? ''); 
    
    $emaillindinho = $con->real_escape_string($email);
    $sql = "SELECT id, nome, senha FROM usuarios WHERE email = '$emaillindinho'";
    $resultado = $con->query($sql);
    
    if ($resultado && $resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        
        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario'] = $usuario['nome'];
            $_SESSION['autorizado'] = true; 
            
            header("Location: ../index.php");
            exit();
        }
    }
    
    // Se o e-mail ou a palavra-passe estiverem incorretos
    header("Location: login.php?erro=1");
    exit();
}
?>