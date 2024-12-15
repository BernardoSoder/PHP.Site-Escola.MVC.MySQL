<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <title>Desempenho Escolar</title>
</head>
<?php
    require_once '../../models/usuarioModel.php';
    require_once '../../models/tipoUsuarioModel.php';
    require_once '../../models/materiaModel.php';
    require_once '../../models/tipoMateriaModel.php';
    require_once '../../models/notaModel.php';
    session_start();
    if (!isset($_SESSION['esta_logado']) || $_SESSION['esta_logado'] !== true) {
        header("Location: ../login.php");
        exit();
    }
    elseif($_SESSION['id_tipo_usuario'] != 2){
        header("Location: ../principal.php");
        exit();
    }
    $usuarioModel = new usuarioModel();
    $tipoUsuarioModel = new tipoUsuarioModel();
    $usuario = $usuarioModel->buscarUsuarioPorID($_SESSION['id_usuario']);
    $tipoUsuario = $tipoUsuarioModel->tipoUsuario($_SESSION['id_tipo_usuario']);

    #Matérias, classificações e notas - nem vem falar que foi gpt felipe

    $materiaModel = new materiaModel();
    $materias = $materiaModel->buscarMaterias();
    
    $tipoMateriaModel = new tipoMateriaModel();
    $notaModel = new notaModel();
?>
<body>
    <header>
        <h1>Desempenho do Estudante</h1>
        <?php
            require_once "../../public/html/menuAluno.html";
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
        $nota = $notaModel->mediaNota($_SESSION['id_usuario']);
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
                <h4 style="color:">Matéria: <label style="color: crimson;" for="materia"><?=$materia->descricao?></label></h4>
                <h4>Classificação:  <label style="color: crimson;" for="tipoMateria"><?=($tipoMateriaModel->tipoMateria($materia->idTipoMateria))->descricao?></label></h4>
                <h4>Nota:  <?php
                $nota = $notaModel->buscarNotaPorID($_SESSION['id_usuario'], $materia->idMateria);
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
                        <label for="nota" style="color: red;"><?=$nota->valor;?> | Objetivo não atingido: N/A</label>
                        <?php
                    }
                }
                else{
                    ?>
                    <label for="nota" style="color: gray;">N/D</label>
                    <?php
                }
    ?> </h4>
            </div>
        <?php endforeach; ?>
</body>
</html>