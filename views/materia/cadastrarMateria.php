<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="../../public/javascript/script.js"></script>
    <title>Cadastrar Matéria</title>
</head>
<?php
    require_once "../../models/tipoMateriaModel.php";

    session_start();
    if (!isset($_SESSION['esta_logado']) || $_SESSION['esta_logado'] !== true) {
        header("Location: ../login.php");
        exit();
    }
    elseif($_SESSION['id_tipo_usuario'] != 1){
        header("Location: ../principal.php");
        exit();
    }

    $tipoMateriaModel = new tipoMateriaModel();
    
    $tiposMateria = $tipoMateriaModel->buscarTiposMateria();
?>
<body>
    <header>
        <h1>Cadastrar nova matéria</h1>
        <?php
            require_once "../../public/html/menuAdmin.html";
        ?>
    </header>
    <form action="../../routers/MateriaRouter.php" method="post" onsubmit="return validarCamposCadastrarMateria(event);">
        <label for="materia">Matéria</label>
        <br>
        <input type="text" name="materia" id="materia" required>
        <br>
        <label for="classficacao">Classificação</label>
        <br>
        <select name="id_tipo_materia" id="id_tipo_materia" required>
            <option value="0">Selecione: </option>
            <?php foreach ($tiposMateria as $tipoMateria) :?>       
                <option value="<?=$tipoMateria->idTipoMateria ?>"><?=$tipoMateria->descricao ?></option>
            <?php endforeach; ?>
        </select>
        <a href="tipoMateria/cadastrarTipoMateria.php">Cadastrar nova classificação</a>
        <br>
        <br>
        <label for="senhaAdmin">Digite sua senha atual</label>
        <br>
        <input type="password" minlength="8" name="senhaAdmin" id="senhaAdmin" required>
        <br>
        <br>
        <input type="hidden" name="rota" id="rota" value="cadastrarMateria">
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>