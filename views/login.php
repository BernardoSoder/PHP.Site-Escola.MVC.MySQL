<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <script src="../public/javascript/script.js"></script>
    <title>Login</title>
<?php
session_start();
if (isset($_SESSION['esta_logado'])){
    header("Location: principal.php");
}
?>
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
<form action="../routers/usuarioRouter.php" method="post" onsubmit="return validarCamposLogin(event);">
    <label for="email">E-mail</label>
    <br>
    <input type="email" name="email" id="email">
    <br>
    <label for="senha">Senha</label>
    <br>
    <input type="password" minlength="8" name="senha" id="senha">
    <br>
    <br>
    <input type="hidden" name="rota" id="rota" value="entrar">
    <input type="submit" value="Entrar">
</form>
</body>
</html>