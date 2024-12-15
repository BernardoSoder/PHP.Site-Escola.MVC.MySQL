<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="../../public/javascript/script.js"></script>
    <title>Editar Usuário</title>
</head>
<?php
    require_once '../../models/usuarioModel.php';
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

    if ($_GET['idUsuario'] == 1){
        echo '<script>alert("Este usuário não pode ser alterado e/ou editado!");';
        echo ' window.history.back();</script>';

    }
    $usuarioModel = new usuarioModel();
    $usuario = $usuarioModel->buscarUsuarioPorID($_GET['idUsuario']);
    $usuarioTipoUsuario = $usuarioModel->buscarUsuarioPorID($_GET['idUsuario']);

    $tipoUsuarioModel = new tipoUsuarioModel();
    $tiposUsuario = $tipoUsuarioModel->buscarTiposUsuario();
    
?>
<body>
    <header>
        <h1>Alterar Informações do Usuário</h1>
        <?php
            require_once "../../public/html/menuAdmin.html";
        ?>
    </header>
    <form action="../../routers/usuarioRouter.php" method="post" onsubmit="return validarCamposEditarUsuario(event);">
        <label for="nome">Nome</label>
        <br>
        <input type="text" name="nome" id="nome" value="<?=$usuario->nome?>" required>
        <br>
        <label for="email">E-mail</label>
        <br>
        <input type="email" name="email" id="email" value="<?=$usuario->email?>" required>
        <br>
        <br>
        <label for="idTipoUsuario">Selecione o tipo de usuário</label>
        <br>
        <select name="idTipoUsuario" id="idTipoUsuario">
            <?php foreach ($tiposUsuario as $tipoUsuario) : ?>
                <?php if ($tipoUsuario->idTipoUsuario == $usuarioTipoUsuario->idTipoUsuario) : ?>
                    <option value="<?=$tipoUsuario->idTipoUsuario;?>" selected><?=$tipoUsuario->descricao;?></option>
                <?php else: ?>
                    <option value="<?= $tipoUsuario->idTipoUsuario ?>"><?= $tipoUsuario->descricao ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <br>
        <br>
        <a id="editarSenha" href="editarSenhaUsuario.php?idUsuario=<?=$_GET['idUsuario']?>">Alterar Senha</a>
        <br>
        <br>
        <label for="senha">Digite sua senha atual</label>
        <br>    
        <input type="password" minlength="8" name="senhaAdmin" id="senhaAdmin" required>
        <br>
        <br>
        <input type="hidden" name="rota" id="rota" value="editarUsuario">
        <input type="hidden" name="idUsuario" id="idUsuario" value="<?=$_GET['idUsuario']?>">
        <input type="submit" value="Confirmar">
    </form>
</body>
</html>