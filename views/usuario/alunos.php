<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <title>Alunos</title>
</head>
<?php
    require_once '../../models/usuarioModel.php';
    require_once '../../models/tipoUsuarioModel.php';
    session_start();
    if (!isset($_SESSION['esta_logado']) || $_SESSION['esta_logado'] !== true) {
        header("Location: login.php");
        exit();
    }
    elseif($_SESSION['id_tipo_usuario'] != 1){
        header("Location: ../principal.php");
        exit();
    }
    $usuarioModel = new usuarioModel();
    $alunos = $usuarioModel->buscarAlunos();
    $tipoUsuarioModel = new tipoUsuarioModel();
?>
<body>
    <header>
        <h1>Alunos</h1>
        <?php
            require_once "../../public/html/menuAdmin.html";
        ?>
    </header>
    <?php foreach ($alunos as $aluno) :?>
        <tr>
            <div>
            <h4>Nome: <label style="color: crimson;" for="nome"><?=$aluno->nome; ?></label></h4>
            <h4>E-mail: <label style="color: crimson;" for="email"><?=$aluno->email; ?></label></h4>
                <td>
                <br>
                <a id="notas" href="../materia/materiasAluno.php?idUsuario=<?=$aluno->idUsuario;?>" name="notas" id="notas">Notas</a>
                </td>
                <br>
            </div>
        </tr>
     <?php endforeach; ?>
</body>
</html>