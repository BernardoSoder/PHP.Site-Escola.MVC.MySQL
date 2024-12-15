<?php
    require_once "../controllers/materiaController.php";

    $materiaController = new materiaController();

    $rota = $_POST["rota"];

    switch($rota){
        case "cadastrarMateria":
            $descricao = $_POST['materia'];
            $idTipoMateria = $_POST['id_tipo_materia'];
            $senhaAdmin = $_POST['senhaAdmin'];

            $materiaController->cadastrarMateria($descricao, $idTipoMateria, $senhaAdmin);

            break;
        
        case "excluir":
            $id_materia = $_POST['id_materia'];

            $materiaController->excluirMateria($id_materia);

            break;
        
        case "editarMateria":
            $idMateria = $_POST['idMateria'];
            $idTipoMateria = $_POST['idTipoMateria'];
            $descricao = $_POST['nome'];
            $senhaAdmin = $_POST['senhaAdmin'];

            $materiaController->editarMateria($idMateria, $idTipoMateria, $descricao, $senhaAdmin);

            break;
    }
?>