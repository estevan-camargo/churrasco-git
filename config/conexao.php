<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $con = new mysqli('localhost', 'root', '', 'churrasco');
    $con->set_charset("utf8mb4");
} catch (mysqli_sql_exception $e) {
    die("Erro ao conectar à base de dados.");
}
?>