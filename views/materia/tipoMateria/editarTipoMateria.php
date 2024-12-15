<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <script src="../../../public/javascript/script.js"></script>
    <title>Editar Classificação</title>
</head>
<?php
    require_once '../../../models/materiaModel.php';
    require_once '../../../models/tipoMateriaModel.php';
    session_start();
    if (!isset($_SESSION['esta_logado']) || $_SESSION['esta_logado'] !== true) {
        header("Location: ../../login.php");
        exit();
    }
    elseif($_SESSION['id_tipo_usuario'] != 1){
        header("Location: ../../principal.php");
        exit();
    }

    if ($_GET['idTipoMateria'] == 1){
        echo '<script>alert("Esta classificação não pode ser alterada e/ou editada!");';
        echo ' window.history.back();</script>';
    }

    $tipoMateriaModel = new tipoMateriaModel();
    $tipoMateria = $tipoMateriaModel->tipoMateria($_GET['idTipoMateria']);
    
?>
<body>
    <header>
        <h1>Alterar Informações da Classificação</h1>
        <?php
            require_once "../../../public/html/menuAdmin.html";
        ?>
    </header>
    <form action="../../../routers/tipoMateriaRouter.php" method="post" onsubmit="return validarCamposEditarTipoMateria(event);">
        <label for="nome">Classificação</label>
        <br>
        <input type="text" name="nome" id="nome" value="<?=$tipoMateria->descricao?>" required>
        <br>
        <br>
        <label for="senhaAdmin">Digite sua senha atual</label>
        <br>    
        <input type="password" minlength="8" name="senhaAdmin" id="senhaAdmin" required>
        <br>
        <br>
        <input type="hidden" name="rota" id="rota" value="editarTipoMateria">
        <input type="hidden" name="idTipoMateria" id="idTipoMateria" value="<?=$_GET['idTipoMateria']?>">
        <input type="submit" value="Confirmar">
    </form>
</body>                 
</html>