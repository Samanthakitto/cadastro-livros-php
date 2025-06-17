<?php
require 'config.php';
if (!isset($_SESSION["usuario_id"])) die("Acesso negado.");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    if ($titulo && $descricao) {
        $stmt = $mysqli->prepare("INSERT INTO itens (usuario_id, titulo, descricao) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $_SESSION["usuario_id"], $titulo, $descricao);
        $stmt->execute();
        header("Location: dashboard.php");
    } else echo "Preencha todos os campos.";
}
?>
<form method="post">
  Título: <input type="text" name="titulo"><br>
  Descrição: <textarea name="descricao"></textarea><br>
  <button type="submit">Adicionar</button>
</form>
