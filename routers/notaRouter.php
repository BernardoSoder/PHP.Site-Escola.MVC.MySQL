<?php
    require_once '../controllers/notaController.php';

    $notaController = new notaController();

    $rota = $_POST['rota'];

    switch($rota){
        case 'editarNota':
            $nota = $_POST['nota'];
            $senhaAdmin = $_POST['senhaAdmin'];
            $idUsuario = $_POST['idUsuario'];
            $idMateria = $_POST['idMateria'];

            $notaController->editarNota($nota, $senhaAdmin, $idUsuario, $idMateria);

            break;

        case 'excluirNota':
            $idUsuario = $_POST['idUsuario'];
            $idMateria = $_POST['idMateria'];

            $notaController->excluirNota($idUsuario, $idMateria);

            break;
            
    }
?>