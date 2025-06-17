<?php
require 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
    $email = $_POST["email"];
    if ($login && $senha && $email) {
        $stmt = $mysqli->prepare("INSERT INTO usuarios (login, senha, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $login, $senha, $email);
        $stmt->execute();
        echo "Usuário cadastrado! <a href='login.php'>Login</a>";
    } else {
        echo "Todos os campos são obrigatórios.";
    }
}
?>
<form method="post">
  Login: <input type="text" name="login"><br>
  Senha: <input type="password" name="senha"><br>
  Email: <input type="email" name="email"><br>
  <button type="submit">Cadastrar</button>
</form>
