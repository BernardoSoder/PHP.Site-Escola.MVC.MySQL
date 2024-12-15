<?php
    require_once "../controllers/usuarioController.php";

    $usuarioController = new usuarioController();

    $rota = $_POST["rota"];
    
    session_start();

    switch($rota){
        case "entrar":
            $email = $_POST["email"];
            $senha = $_POST["senha"];

            $usuarioController->validarUsuario($email, $senha);

            break;

        case "cadastrar":
            $idTipoUsuario = $_POST["id_tipo_usuario"];
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $senhaAdmin = $_POST['senhaAdmin'];
            
            $usuarioController->cadastrarUsuario($idTipoUsuario, $nome, $email, $senha, $senhaAdmin);

            break;
            
        case "alterarNome":
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];
            $idUsuario = $_SESSION['id_usuario'];

            $usuarioController->alterarNome($nome, $senha, $idUsuario);

            break;

        case "alterarEmail":
            $email = $_POST["email"];
            $confirmarEmail = $_POST['confirmarEmail'];
            $senha = $_POST['senha'];
            $idUsuario = $_SESSION['id_usuario'];

            $usuarioController->alterarEmail($email, $confirmarEmail, $senha, $idUsuario);

            break;
        
         case "alterarSenha":
            $senhaAtual = $_POST['senha'];
            $senha = $_POST["senhaNova"];
            $confirmarSenha = $_POST['confirmarSenha'];
            $idUsuario = $_SESSION['id_usuario'];

            $usuarioController->alterarSenha($senhaAtual, $senha, $confirmarSenha, $idUsuario);

            break;

        case "excluir":
            $idUsuario = $_POST['idUsuario'];

            $usuarioController->excluirUsuario($idUsuario);

            break;
        
        case "editarUsuario":
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $idTipoUsuario = $_POST['idTipoUsuario'];
            $senha = $_POST['senhaAdmin'];
            $idUsuario = $_POST['idUsuario'];
 
            $usuarioController->editarUsuario($nome, $email, $idTipoUsuario, $senha, $idUsuario);

            break;

        case "editarSenhaUsuario":
            $senha = $_POST['senha'];
            $confirmarSenha = $_POST['confirmarSenha'];
            $senhaAdmin = $_POST['senhaAdmin'];
            $idUsuario = $_POST['idUsuario'];

            $usuarioController->editarSenhaUsuario($senha, $confirmarSenha, $senhaAdmin, $idUsuario);
            break;
        }
?>