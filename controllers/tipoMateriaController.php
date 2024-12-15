<?php
    require_once '../models/tipoMateriaModel.php';
    require_once '../models/usuarioModel.php';
    session_start();

    class tipoMateriaController{
        public function cadastrarTipoMateria(string $nome, string $senhaAdmin){
            $senhaAdmin = md5(str_replace(" ", "", $senhaAdmin));
            $usuarioModel = new usuarioModel();
            $senhaAtualDB = $usuarioModel->buscarUsuarioPorID($_SESSION['id_usuario']);

            if ($senhaAdmin != $senhaAtualDB->senha){
                echo '<script>alert("Senha atual incorreta!");';
                echo ' window.history.back();</script>';
            }
            else{
                $tipoMateriaModel = new tipoMateriaModel();
                $tipoMateria = new tipoMateriaModel(null, $nome);

                $retorno = $tipoMateriaModel->cadastrarTipoMateria($tipoMateria);
                
                if ($retorno){
                    header("Location: ../views/materia/tipoMateria/listarTiposMateria.php");
                }
                else{
                    echo '<script>alert("Erro ao cadastrar classificação de matéria!");';
                    echo ' window.history.back();</script>';
                }
    
                exit();       
            }
        }

        public function excluirTipoMateria(int $idTipoMateria){
            if ($idTipoMateria == 1){
                echo '<script>alert("Esta classificação não pode ser deletada!");';
                echo ' window.history.back();</script>';
            }
            $tipoMateriaModel = new tipoMateriaModel();
            $tipoMateria = new tipoMateriaModel($idTipoMateria, null);

            $retorno = $tipoMateriaModel->excluirTipoMateria($tipoMateria);

            if ($retorno){
                header("Location: ../views/materia/tipoMateria/listarTiposMateria.php");
            }
            else{
                echo '<script>alert("Erro ao excuir classificação!");';
                echo ' window.history.back();</script>';
            }

            exit();
        }

        public function editarTipoMateria(int $idTipoMateria, string $nome, string $senhaAdmin){
            $senhaAdmin = md5(str_replace(" ", "", $senhaAdmin));
            $usuarioModel = new usuarioModel();
            $senhaAtualDB = $usuarioModel->buscarUsuarioPorID($_SESSION['id_usuario']);
            
            if ($senhaAdmin != $senhaAtualDB->senha){
                echo '<script>alert("Senha atual incorreta!");';
                echo ' window.history.back();</script>';
            }
            elseif($idTipoMateria == 1){
                echo '<script>alert("Esta classificação não pode ser alterada e/ou editada!");';
                echo ' window.history.back();</script>';
            }
            else{
                $tipoMateriaModel = new tipoMateriaModel();
                $tipoMateria = new tipoMateriaModel($idTipoMateria, $nome);

                $retorno = $tipoMateriaModel->editarTipoMateria($tipoMateria);
                
                if ($retorno){
                    header("Location: ../views/materia/tipoMateria/listarTiposMateria.php");
                }
                else{
                    echo '<script>alert("Erro ao cadastrar classificação de matéria!");';
                    echo ' window.history.back();</script>';
                }
    
                exit();       
            } 
        }
    }
?>