<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="../../public/javascript/script.js"></script>
    <title>Alterar E-Mail</title>
</head>
<?php
    require_once '../../models/usuarioModel.php';
    session_start();
    $usuarioModel = new usuarioModel();
    $usuario = $usuarioModel->buscarUsuarioPorID($_SESSION['id_usuario']);
    if (!isset($_SESSION['esta_logado']) || $_SESSION['esta_logado'] !== true) {
        header("Location: ../login.php");
        exit();
    }
?>
<body>
    <header>
        <h1>Alterar E-mail</h1>
        <?php
            if ($_SESSION['id_tipo_usuario'] == 1){
                require_once "../../public/html/menuAdmin.html";
            }
            else{
                require_once "../../public/html/menuAluno.html";
            }
        ?>
    </header>
    <form action="../../routers/usuarioRouter.php" method="post" onsubmit="return validarCamposAlterarEmail(event);">
        <label for="novoEmail">Novo e-mail</label>
        <br>
        <input type="email" name="email" id="email" value="<?=$usuario->email?>" required>
        <br>
        <label for="confirmarEmail">Confirmar e-mail</label>
        <br>
        <input type="email" name="confirmarEmail" id="confirmarEmail" required>
        <br>
        <br>
        <label for="senha">Digite sua senha atual</label>
        <br>    
        <input type="password" minlength="8" name="senha" id="senha" required>
        <br>
        <br>
        <input type="hidden" name="rota" id="rota" value="alterarEmail">
        <input type="submit" value="Confirmar">
    </form>
</body>
</html>