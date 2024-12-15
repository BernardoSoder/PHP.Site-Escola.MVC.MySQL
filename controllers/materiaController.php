<?php
    require_once '../models/materiaModel.php';
    require_once '../models/usuarioModel.php';
    session_start();

    class materiaController{
        public function cadastrarMateria(string $descricao, int $idTipoMateria, string $senhaAdmin){
            $senhaAdmin = md5(str_replace(" ", "", $senhaAdmin));
            $usuarioModel = new usuarioModel();
            $senhaAtualDB = $usuarioModel->buscarUsuarioPorID($_SESSION['id_usuario']);

            if ($senhaAdmin != $senhaAtualDB->senha){
                echo '<script>alert("Senha atual incorreta!");';
                echo ' window.history.back();</script>';
            }
            else{
                $materiaModel = new materiaModel();
                $materia = new materiaModel(null, $idTipoMateria, $descricao);

                $retorno = $materiaModel->cadastrarMateria($materia);

                if ($retorno){
                    header("Location: ../views/materia/listarMaterias.php");
                }
                else{
                    echo '<script>alert("Erro ao cadastrar matéria!");';
                    echo ' window.history.back();</script>';
                }

                exit();
            }

        }

        public function excluirMateria(int $id_materia){
            $materiaModel = new materiaModel();
            $materia = new materiaModel($id_materia, null, null);

            $retorno = $materiaModel->excluirMateria($materia);

            if ($retorno){
                header("Location: ../views/materia/listarMaterias.php");
            }
            else{
                echo '<script>alert("Erro ao excuir matéria!");';
                echo ' window.history.back();</script>';
            }

            exit();
        }

        public function editarMateria(int $idMateria, int $idTipoMateria, string $descricao, string $senhaAdmin){
            $senhaAdmin = md5(str_replace(" ", "", $senhaAdmin));
            $usuarioModel = new usuarioModel();
            $senhaAtualDB = $usuarioModel->buscarUsuarioPorID($_SESSION['id_usuario']);

            if ($senhaAdmin != $senhaAtualDB->senha){
                echo '<script>alert("Senha atual incorreta!");';
                echo ' window.history.back();</script>';
            }
            else{
                $materiaModel = new materiaModel();
                $materia = new materiaModel($idMateria, $idTipoMateria, $descricao);

                $retorno = $materiaModel->editarMateria($materia);

                if ($retorno){
                    header("Location: ../views/materia/listarMaterias.php");
                }
                else{
                    echo '<script>alert("Erro ao editar matéria!");';
                    echo ' window.history.back();</script>';
                }

                exit();
            }
        }
    }
?>