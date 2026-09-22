<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "churrasco";

$con = new mysqli($host, $usuario, $senha, $banco);

if ($con->connect_error) {
    die("Falha na conexão: " . $con->connect_error);
}
//else echo 'resenha';
?>