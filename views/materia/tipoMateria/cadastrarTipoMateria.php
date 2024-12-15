<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <script src="../../../public/javascript/script.js"></script>
    <title>Cadastrar Classificação</title>
</head>
<?php
    session_start();
    if (!isset($_SESSION['esta_logado']) || $_SESSION['esta_logado'] !== true) {
        header("Location: ../../login.php");
        exit();
    }
    elseif($_SESSION['id_tipo_usuario'] != 1){
        header("Location: ../../principal.php");
        exit();
    }
?>
<body>
    <header>
        <h1>Cadastrar Nova Classificação</h1>
        <?php
            require_once "../../../public/html/menuAdmin.html";
        ?>
    </header>
    <form action="../../../routers/tipoMateriaRouter.php" method="post" onsubmit="return validarCamposCadastrarTipoMateria(event);">
        <label for="Nome">Classificação</label>
        <br>
        <input type="text" name="nome" id="nome">
        <br>
        <br>
        <label for="senhaAdmin">Digite sua senha atual</label>
        <br>
        <input type="password" minlength="8" name="senhaAdmin" id="senhaAdmin" required>
        <br>
        <br>
        <input type="hidden" name="rota" id="rota" value="cadastrarTipoMateria">
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>