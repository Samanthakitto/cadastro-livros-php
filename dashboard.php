<?php
require 'config.php';
if (!isset($_SESSION["usuario_id"])) die("Acesso negado.");
$usuario_id = $_SESSION["usuario_id"];
$result = $mysqli->query("SELECT id, titulo, descricao FROM itens WHERE usuario_id = $usuario_id");
echo "<a href='add_item.php'>Adicionar Item</a> | <a href='logout.php'>Logout</a><hr>";
while ($row = $result->fetch_assoc()) {
    echo "<b>{$row['titulo']}</b><br>{$row['descricao']}<br>
    <a href='edit_item.php?id={$row['id']}'>Editar</a> | 
    <a href='delete_item.php?id={$row['id']}'>Excluir</a><hr>";
}
?>
