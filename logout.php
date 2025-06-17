<?php
require 'config.php';
if (!isset($_SESSION["usuario_id"])) die("Acesso negado.");
$id = $_GET["id"];
$stmt = $mysqli->prepare("SELECT titulo, descricao FROM itens WHERE id = ? AND usuario_id = ?");
$stmt->bind_param("ii", $id, $_SESSION["usuario_id"]);
$stmt->execute();
$stmt->bind_result($titulo, $descricao);
$stmt->fetch();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    if ($titulo && $descricao) {
        $stmt = $mysqli->prepare("UPDATE itens SET titulo=?, descricao=? WHERE id=? AND usuario_id=?");
        $stmt->bind_param("ssii", $titulo, $descricao, $id, $_SESSION["usuario_id"]);
        $stmt->execute();
        header("Location: dashboard.php");
    } else echo "Preencha todos os campos.";
}
?>
<form method="post">
  Título: <input type="text" name="titulo" value="<?= $titulo ?>"><br>
  Descrição: <textarea name="descricao"><?= $descricao ?></textarea><br>
  <button type="submit">Salvar</button>
</form>
