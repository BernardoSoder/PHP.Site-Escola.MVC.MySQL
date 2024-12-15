<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="../../public/javascript/script.js"></script>
    <title>Alterar Senha</title>
</head>
<?php
    session_start();
    if (!isset($_SESSION['esta_logado']) || $_SESSION['esta_logado'] !== true) {
        header("Location: ../login.php");
        exit();
    }
?>
<body>
    <header>
        <h1>Alterar Senha</h1>
        <?php
            if ($_SESSION['id_tipo_usuario'] == 1){
                require_once "../../public/html/menuAdmin.html";
            }
            else{
                require_once "../../public/html/menuAluno.html";
            }
        ?>
    </header>
    <form action="../../routers/usuarioRouter.php" method="post" onsubmit="return validarCamposAlterarSenha(event);">
        <label for="senha">Nova senha</label>
        <br>
        <input type="password" name="senhaNova" id="senhaNova" required>
        <br>
        <label for="confirmarSenha">Confirmar senha</label>
        <br>
        <input type="password" name="confirmarSenha" id="confirmarSenha" required>
        <br>
        <br>
        <label for="senha">Digite sua senha atual</label>
        <br>
        <input type="password" minlength="8" name="senha" id="senha" required>
        <br>
        <br>
        <input type="hidden" name="rota" id="rota" value="alterarSenha">
        <input type="submit" value="Confirmar">
    </form>
</body>
</html>