<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['autorizado']) || $_SESSION['autorizado'] !== true) {
    header("Location: ../auth/login.php");
    exit();
}
?>