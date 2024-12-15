<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <title>Informações da Conta</title>
</head>
<?php
    require_once '../../models/usuarioModel.php';
    session_start();
    if (!isset($_SESSION['esta_logado']) || $_SESSION['esta_logado'] !== true) {
        header("Location: ../login.php");
        exit();
    }
    $usuarioModel = new usuarioModel();
    $usuario = $usuarioModel->buscarUsuarioPorID($_SESSION['id_usuario']);
?>
<body>
    <header>
        <h1>Alterar Credenciais</h1>
        <?php
            if ($_SESSION['id_tipo_usuario'] == 1){
                require_once "../../public/html/menuAdmin.html";
            }
            else{
                require_once "../../public/html/menuAluno.html";
            }
        ?>
    </header>
        <label for="nomeAtual" >Nome</label>
        <br>
        <label for="nome" id="nomeAtual"><?=$usuario->nome?></label>
        <a href="alterarNome.php" id="alterarNome">Alterar nome de usuário</a>
        <br>
        <br>
        <label for="emailAtual" >E-mail</label>
        <br>
        <label for="email" id="emailAtual"><?=$usuario->email?></label>
        <a href="alterarEmail.php" id="alterarEmail">Alterar e-mail</a>
        <br>
        <br>
        <label for="alterarSenha">Senha</label>     
        <br> 
        <a href="alterarSenha.php" id="alterarSenha">Alterar senha</a>
</body>
</html>