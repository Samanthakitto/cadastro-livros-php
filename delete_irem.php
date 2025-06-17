<?php
require 'config.php';
if (!isset($_SESSION["usuario_id"])) die("Acesso negado.");
$id = $_GET["id"];
$stmt = $mysqli->prepare("DELETE FROM itens WHERE id = ? AND usuario_id = ?");
$stmt->bind_param("ii", $id, $_SESSION["usuario_id"]);
$stmt->execute();
header("Location: dashboard.php");
?>
