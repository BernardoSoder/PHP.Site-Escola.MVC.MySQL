<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="../../public/javascript/script.js"></script>
    <title>Usuários</title>
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
    $usuarios = $usuarioModel->buscarUsuarios();
    $tipoUsuarioModel = new tipoUsuarioModel();
?>
<body>
    <header>
        <h1>Usuários</h1>
        <?php
            require_once "../../public/html/menuAdmin.html";
        ?>
        <a href="cadastrarUsuario.php">Cadastrar Novo Usuário</a>
        <br>
        <br>
    </header>
    <?php foreach ($usuarios as $usuario) :?>
        <tr>
            <div>
            <h4>Nome: <label style="color: crimson;" for="nome"><?=$usuario->nome; ?></label></h4>
            <h4>E-mail: <label style="color: crimson;" for="email"><?=$usuario->email; ?></label></h4>
            <h4>Tipo Usuário: <label style="color: crimson;" for="tipoUsuario"><?=($tipoUsuarioModel->tipoUsuario($usuario->idTipoUsuario))->descricao; ?></label></h4>
            <h4>ID: <label style="color: crimson;" for="idUsuario"><?=$usuario->idUsuario ?></label></h4>
            <?php
            if($usuario->idUsuario == 1){
                ?>
                <label style="color: darkred" for="aviso">Este usuário não pode ser editado e/ou excluído!</label> 
                <br>
                <br>
                <?php
            };
            ?>
                <td>
                <a id="editar" href="editarUsuario.php?idUsuario=<?=$usuario->idUsuario;?>" name="editar" id="editar">Editar</a>
                <br>
                <br>
                    <form action="../../routers/usuarioRouter.php" method="post" onsubmit="return validarCamposExcluirUsuario(event);">
                        <input type="hidden" name="rota" id="rota" value="excluir">
                        <input type="hidden" name="idUsuario" id="idUsuario" value="<?=$usuario->idUsuario;?>">
                        <input type="submit" value="Excluir" onclick="return confirmarExcluir();">
                    </form>
                </td>
                <br>
            </div>
        </tr>
     <?php endforeach; ?>
</body>
</html>