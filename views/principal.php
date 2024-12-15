<!DOCTYPE html>
<html lang="pt-br">
<link rel="stylesheet" href="../public/css/style.css">
<?php
    require_once '../models/tipoUsuarioModel.php';
    session_start();
    if ($_SESSION['esta_logado'] !== True){
        header("Location: login.php");
    }
    $tipoUsuarioModel = new tipoUsuarioModel();
    $tipoUsuario = $tipoUsuarioModel->tipoUsuario($_SESSION['id_tipo_usuario']);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do <?=$tipoUsuario->descricao?></title>
</head>
<body>
    <header>
        <h1>Página do <?=$tipoUsuario->descricao?></h1>
    </header>
<?php
    if ($_SESSION['id_tipo_usuario'] == 1){
        require_once "../public/html/menuAdmin.html";
    }
    else{
        require_once "../public/html/menuAluno.html";
    }
?>
</body>
</html>