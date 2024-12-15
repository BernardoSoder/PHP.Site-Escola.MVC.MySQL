<?php
    require_once "../controllers/tipoMateriaController.php";

    $tipoMateriaController = new tipoMateriaController();

    $rota = $_POST['rota'];

    switch($rota){
        case "cadastrarTipoMateria":
            $nome = $_POST['nome'];
            $senhaAdmin = $_POST['senhaAdmin'];
            
            $tipoMateriaController->cadastrarTipoMateria($nome, $senhaAdmin);

            break;
        
        case "excluirTipoMateria":
            $idTipoMateria = $_POST['id_tipo_materia'];

            $tipoMateriaController->excluirTipoMateria($idTipoMateria);

            break;

        case "editarTipoMateria":
            $idTipoMateria = $_POST['idTipoMateria'];
            $nome = $_POST['nome'];
            $senhaAdmin = $_POST['senhaAdmin'];
            
            $tipoMateriaController->editarTipoMateria($idTipoMateria, $nome, $senhaAdmin);

            break;   
    }
?>