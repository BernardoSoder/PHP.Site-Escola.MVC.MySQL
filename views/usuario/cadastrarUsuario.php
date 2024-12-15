<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="../../public/javascript/script.js"></script>
    <title>Cadastrar Usuário</title>
</head>
<?php
    require_once "../../models/tipoUsuarioModel.php";

    session_start();
    if (!isset($_SESSION['esta_logado']) || $_SESSION['esta_logado'] !== true) {
        header("Location: ../login.php");
        exit();
    }
    elseif($_SESSION['id_tipo_usuario'] != 1){
        header("Location: ../principal.php");
        exit();
    }

    $tipoUsuarioModel = new tipoUsuarioModel();
    
    $tiposUsuario = $tipoUsuarioModel->buscarTiposUsuario();
?>
<body>
    <header>
        <h1>Cadastrar Usuário</h1>
        <?php
            require_once "../../public/html/menuAdmin.html";
        ?>
    </header>
    <form action="../../routers/usuarioRouter.php" method="post" onsubmit="return validarCamposCadastrarUsuario(event);">
        <label for="nome">Nome</label>
        <br>
        <input type="text" name="nome" id="nome" required>
        <br>
        <label for="email">E-mail</label>
        <br>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="senha">Senha</label>
        <br>
        <input type="password" minlength="8" name="senha" id="senha" required>
        <br>
        <label for="minimo">*Mínimo de 8 caracteres*</label>
        <br>
        <br>
        <label for="id_tipo_usuario">Selecione o tipo de usuário</label>
        <br>
        <select name="id_tipo_usuario" id="id_tipo_usuario" required>
            <option value="0">Selecione: </option>
            <?php foreach ($tiposUsuario as $tipoUsuario) :?>       
                <option value="<?=$tipoUsuario->idTipoUsuario ?>"><?=$tipoUsuario->descricao ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <br>
        <label for="senhaAdmin">Digite sua senha atual</label>
        <br>
        <input type="password" minlength="8" name="senhaAdmin" id="senhaAdmin" required>
        <br>
        <br>
        <input type="hidden" name="rota" id="rota" value="cadastrar">
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>