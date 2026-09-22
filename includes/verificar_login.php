<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['autorizado']) || $_SESSION['autorizado'] !== true) {
    // Reencaminha para a página de login na pasta auth
    header("Location: /churrasco/auth/login.php");
    exit();
}
?>