<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "cadastro_livros");
if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
}
?>
