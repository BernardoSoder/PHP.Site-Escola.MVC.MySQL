<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="../../public/javascript/script.js"></script>
    <title>Editar Matéria</title>
</head>
<?php
    require_once '../../models/materiaModel.php';
    require_once '../../models/tipoMateriaModel.php';
    session_start();
    if (!isset($_SESSION['esta_logado']) || $_SESSION['esta_logado'] !== true) {
        header("Location: ../login.php");
        exit();
    }
    elseif($_SESSION['id_tipo_usuario'] != 1){
        header("Location: ../principal.php");
        exit();
    }

    $materiaModel = new materiaModel();
    $materia = $materiaModel->buscarMateriaPorID($_GET['idMateria']);

    $tipoMateriaModel = new tipoMateriaModel();
    $tiposMateria = $tipoMateriaModel->buscarTiposMateria();
    
?>
<body>
    <header>
        <h1>Alterar Informações da Matéria</h1>
        <?php
            require_once "../../public/html/menuAdmin.html";
        ?>
    </header>
    <form action="../../routers/materiaRouter.php" method="post" onsubmit="return validarCamposEditarMateria(event);">
        <label for="nome">Matéria</label>
        <br>
        <input type="text" name="nome" id="nome" value="<?=$materia->descricao?>" required>
        <br>
        <br>
        <label for="idTipoMateria">Selecione o tipo de matéria</label>
        <br>
        <select name="idTipoMateria" id="idTipoMateria" required>
            <?php foreach ($tiposMateria as $tipoMateria) : ?>
                <?php if ($tipoMateria->idTipoMateria == $materia->idTipoMateria) : ?>
                    <option value="<?=$tipoMateria->idTipoMateria;?>" selected><?=$tipoMateria->descricao;?></option>
                <?php else: ?>
                    <option value="<?=$tipoMateria->idTipoMateria?>"><?=$tipoMateria->descricao?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <br>
        <br>
        <label for="senha">Digite sua senha atual</label>
        <br>    
        <input type="password" minlength="8" name="senhaAdmin" id="senhaAdmin" required>
        <br>
        <br>
        <input type="hidden" name="rota" id="rota" value="editarMateria">
        <input type="hidden" name="idMateria" id="idMateria" value="<?=$_GET['idMateria']?>">
        <input type="submit" value="Confirmar">
    </form>
</body>                 
</html>