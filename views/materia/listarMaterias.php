<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="../../public/javascript/script.js"></script>
    <title>Matérias</title>
</head>
<?php
    require_once '../../models/materiaModel.php';
    require_once '../../models/tipoMateriaModel.php';
    require_once '../../models/tipoUsuarioModel.php';
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
    $materias = $materiaModel->buscarMaterias();
    $tipoMateriaModel = new tipoMateriaModel();
?>
<body>
    <header>
        <h1>Matérias</h1>
        <?php
             require_once "../../public/html/menuAdmin.html";
        ?>
        <a href="cadastrarMateria.php">Cadastrar Matéria</a>
        <a href="tipoMateria/listarTiposMateria.php">Listar Classificações</a>
        <br>
        <br>
    </header>
    <?php foreach ($materias as $materia) :?>
        <tr>
            <div>
            <h4>Matéria: <label style="color: crimson;" for="materia"><?=$materia->descricao;?></label></h4>
            <h4>Classificação: <label style="color: crimson;" for="tipoMateria"><?=$tipoMateriaModel->tipoMateria($materia->idTipoMateria)->descricao;?></label></h4>
                <td>
                <a id="editar" href="editarMateria.php?idMateria=<?=$materia->idMateria;?>" name="editar" id="editar">Editar</a>
                <br>
                <br>
                    <form action="../../routers/materiaRouter.php" method="post">
                        <input type="hidden" name="rota" id="rota" value="excluir">
                        <input type="hidden" name="id_materia" id="id_materia" value="<?=$materia->idMateria;?>">
                        <input type="submit" value="Excluir" onclick="return confirmarExcluir();">
                    </form>
                </td>
                <br>
            </div>
        </tr>
     <?php endforeach; ?>
</body>
</html>