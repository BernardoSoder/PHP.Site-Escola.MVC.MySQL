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
    require_once '../../models/usuarioModel.php';
    require_once '../../models/materiaModel.php';
    require_once '../../models/tipoMateriaModel.php';
    require_once '../../models/notaModel.php';
    session_start();
    if (!isset($_SESSION['esta_logado']) || $_SESSION['esta_logado'] !== true) {
        header("Location: ../login.php");
        exit();
    }
    elseif($_SESSION['id_tipo_usuario'] != 1){
        header("Location: ../principal.php");
        exit();
    }
    $usuarioModel = new usuarioModel();
    $usuario = $usuarioModel->buscarUsuarioPorID($_GET['idUsuario']);
    $usuariomateria = $usuarioModel->buscarUsuarioPorID($_GET['idUsuario']);

    $materiaModel = new materiaModel();
    $materias = $materiaModel->buscarMaterias();

    $notaModel = new notaModel();

    $tipoMateriaModel = new tipoMateriaModel();

    function tirarAcentos($string){
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }
    ?>
<body>
    <header>
        <h1>Selecione a matéria</h1>
        <?php
            require_once "../../public/html/menuAdmin.html";
        ?>
    </header>
    <div>
    <span style="text-decoration: underline; color: red; -webkit-text-stroke: 1px black;
    font-family: sans-serif;
    font-weight: bold;
    font-style: italic;
    font-size: 25px;
}" ><?="Estudante: ", $usuario->nome ?></span>
    </div>
    <div style="font-size: 20px;">
        <span style="color: red; -webkit-text-stroke: 1px black;
            font-family: sans-serif;
            font-weight: bold;
            font-style: italic;"
            >Média Geral:
        </span> 
    <span style="padding-left: 5px;">
        <?php
        $nota = $notaModel->mediaNota($_GET['idUsuario']);
        if ($nota > 6){
            ?>
            <span style="color: green;"><?=$nota;?> | Objetivo atingido: O/A</span>
            <?php
        }
        elseif($nota == 6){
            ?>
            <span style="color: orange;"><?=$nota;?> | Objetivo parcialmente atingido: P/A</span>
            <?php
        }
        else{
            ?>
            <span style="color: red;"><?=$nota;?> | Objetivo não atingido: N/A</span>
            <?php
        }
        ?>
    </span>
    </div>
        <?php foreach ($materias as $materia) : ?>
            <div>
                <h4>Matéria: <label style="color: crimson;" for="materia"><?=$materia->descricao?></label></h4>
                <h4>Classificação:  <label style="color: crimson;" for="tipoMateria"><?=($tipoMateriaModel->tipoMateria($materia->idTipoMateria))->descricao?></label></h4>
                <h4>Nota:  <label for="nota"><?php
                $nota = $notaModel->buscarNotaPorID($_GET['idUsuario'], $materia->idMateria);
                if (isset($nota->valor) && $nota->valor !== null && $nota->valor !== ''){
                    if ($nota->valor > 6){
                    ?>
                    <label for="nota" style="color: green;"><?=$nota->valor;?> | Objetivo atingido: O/A</label>
                    <?php
                    }
                    elseif($nota->valor == 6){
                        ?>
                        <label for="nota" style="color: orange;"><?=$nota->valor;?> | Objetivo parcialmente atingido: P/A</label>
                        <?php
                    }
                    else{
                        ?>
                        <label for="nota" style="color: red;"><?=$nota->valor;?> | Objetivo não atingido: N/A </label>
                        <?php
                    }
                }
                else{
                    ?>
                    <label for="nota" style="color: gray;">N/D</label>
                    <?php
                }
    ?></label></h4>
                <br>
                <a href="../nota/editarNota.php?idUsuario=<?=$_GET['idUsuario']?>&idMateria=<?=$materia->idMateria?>">Postar/Alterar Nota</a>
                <br>
                <br>
                <form action="../../routers/notaRouter.php" method="post">
                    <input type="hidden" name="rota" id="rota" value="excluirNota">
                    <input type="hidden" name="idUsuario" id="idUsuario" value="<?=$usuario->idUsuario;?>">
                    <input type="hidden" name="idMateria" id="idMateria" value="<?=$materia->idMateria;?>">
                    <input type="submit" value="Excluir Nota" onclick="return confirmarExcluir();">
                </form>
            </div>
        <?php endforeach; ?>
</body>
</html>