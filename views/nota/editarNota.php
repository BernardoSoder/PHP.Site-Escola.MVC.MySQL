<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="../../public/javascript/script.js"></script>
    <title>Editar Nota</title>
</head>
<?php
    session_start();
    if (!isset($_SESSION['esta_logado']) || $_SESSION['esta_logado'] !== true) {
        header("Location: ../login.php");
        exit();
    }
    elseif($_SESSION['id_tipo_usuario'] != 1){
        header("Location: ../principal.php");
        exit();
    }
?>
<body>
    <form action="../../routers/notaRouter.php" method="post" onsubmit="return validarCamposEditarNota(event);">
        <header>
            <h1>Alterar/Postar Desempenho do Estudante</h1>
            <?php
                require_once "../../public/html/menuAdmin.html";
            ?>
        </header>
        <label for="nota">Nota</label>
        <br>
        <input type="number" name="nota" id="nota" step=0.1 min=0 max=10>
        <br>
        <br>
        <label for="senhaAdmin">Digite sua senha atual</label>
        <br>
        <input type="password" minlength="8" name="senhaAdmin" id="senhaAdmin" required>
        <br>
        <br>
        <input type="hidden" name="rota" id="rota" value="editarNota">
        <input type="hidden" name="idUsuario" id="idUsuario" value="<?=$_GET['idUsuario']?>">
        <input type="hidden" name="idMateria" id="idMateria" value="<?=$_GET['idMateria']?>">
        <input type="submit" value="Confirmar">
    </form>
</body>
</html>