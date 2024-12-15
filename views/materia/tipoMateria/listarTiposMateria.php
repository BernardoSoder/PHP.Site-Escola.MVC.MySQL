<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <script src="../../../public/javascript/script.js"></script>
    <title>Listar Classificações</title>
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
    
    require_once '../../../models/tipoMateriaModel.php';
    require_once '../../../models/materiaModel.php';
    $tipoMateriaModel = new tipoMateriaModel();
    $TiposMateria = $tipoMateriaModel->buscarTiposMateria();
    $materiaModel = new materiaModel();

?>
<body>
    <header>
        <h1>Classificações</h1>
        <?php
            require_once "../../../public/html/menuAdmin.html";
        ?>
        <a href="cadastrarTipoMateria.php">Cadastrar Classificação</a>
        <br>
        <br>
    </header>
<?php foreach ($TiposMateria as $tipoMateria) : ?>
    <?php if ($tipoMateria->descricao != "N/D"){
        ?>
        <tr>
        <div>
            <h4>Classificação: <?= $tipoMateria->descricao ?></h4>
            <h4>Materias:
                <?php 
                $materias = $materiaModel->buscarMateriasPorTipoMateria($tipoMateria->idTipoMateria);
                if (!empty($materias)) {
                    foreach ($materias as $materia) {
                        if (!empty($materia->descricao) && isset($materia->descricao)) {
                            echo $materia->descricao, " | ";
                        } else {
                            echo "N/D.";
                        }
                    }
                } else {
                    echo "N/D.";
                }
                ?>
            </h4>
            <td>
                <a id="editar" href="editarTipoMateria.php?idTipoMateria=<?= $tipoMateria->idTipoMateria; ?>" name="editar" id="editar">Editar Classificação</a>
                <br>
                <br>
                <form action="../../../routers/tipoMateriaRouter.php" method="post" onsubmit="return validarCamposExcluirTipoMateria(event);">
                    <input type="hidden" name="rota" id="rota" value="excluirTipoMateria">
                    <input type="hidden" name="id_tipo_materia" id="id_tipo_materia" value="<?= $tipoMateria->idTipoMateria; ?>">
                    <input type="submit" value="Excluir" onclick="return confirmarExcluir();">
                </form>
            </td>
            <br>
        </div>
    </tr>
    <?php
    } ?>
    
<?php endforeach; ?>
</body>
</html>