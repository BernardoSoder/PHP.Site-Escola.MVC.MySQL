<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="../../public/javascript/script.js"></script>
    <title>Alterar Senha do Usuário</title>
</head>
<?php
    require_once '../../models/usuarioModel.php';
    session_start();
    if (!isset($_SESSION['esta_logado']) || $_SESSION['esta_logado'] !== true) {
        header("Location: ../login.php");
        exit();
    }
    elseif($_SESSION['id_tipo_usuario'] != 1){
        header("Location: ../principal.php");
        exit();
    }

    if ($_GET['idUsuario'] == 1){
        echo '<script>alert("Este usuário não pode ser alterado e/ou editado!");';
        echo ' window.history.back();</script>';

    }
?>
<body>
    <header>
        <h1>Alterar Senha do Usuário</h1>
        <?php
            require_once "../../public/html/menuAdmin.html";
        ?>

    </header>
    <form action="../../routers/usuarioRouter.php" method="post" onsubmit="return validarCamposEditarSenhaUsuario(event);">
        <label for="senha">Senha</label>
        <br>
        <input type="password" name="senha" id="senha" required>
        <br>
        <label for="confirmarSenha">Confirmar Senha</label>
        <br>
        <input type="password" name="confirmarSenha" id="confirmarSenha" required>
        <br>
        <br>
        <label for="senhaAdmin">Digite sua senha atual</label>
        <br>
        <input type="password" minlength="8" name="senhaAdmin" id="senhaAdmin" required>
        <br>
        <br>
        <input type="hidden" name="rota" id="rota" value="editarSenhaUsuario">
        <input type="hidden" name="idUsuario" id="idUsuario" value="<?=$_GET['idUsuario']?>">
        <input type="submit" value="Confirmar">
    </form>
</body>
</html> 