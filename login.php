<?php
require 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $stmt = $mysqli->prepare("SELECT id, senha FROM usuarios WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hash);
        $stmt->fetch();
        if (password_verify($senha, $hash)) {
            $_SESSION["usuario_id"] = $id;
            header("Location: dashboard.php");
        } else echo "Senha inválida.";
    } else echo "Usuário não encontrado.";
}
?>
<form method="post">
  Login: <input type="text" name="login"><br>
  Senha: <input type="password" name="senha"><br>
  <button type="submit">Entrar</button>
</form>
