<?php
    require_once '../models/notaModel.php';
    require_once '../models/usuarioModel.php';
    session_start();

    class notaController{
        public function editarNota(float $nota, string $senhaAdmin, int $idUsuario, int $idMateria){
            $senhaAdmin = md5(str_replace(" ", "", $senhaAdmin));
            $usuarioModel = new usuarioModel();
            $senhaAtualDB = $usuarioModel->buscarUsuarioPorID($_SESSION['id_usuario']);

            if ($senhaAdmin != $senhaAtualDB->senha){
                echo '<script>alert("Senha atual incorreta!");';
                echo ' window.history.back();</script>';
            }
            elseif (!is_float($nota) || $nota < 0 || $nota > 10){
                echo '<script>alert("Erro no valor da nota!");';
                echo ' window.history.back();</script>';
            }
            else{
                $notaModel = new notaModel();
                $nota = new notaModel(null, $idUsuario, $idMateria, $nota);

                $retorno = $notaModel->editarNota($nota);

                if ($retorno){
                    echo '<script>window.history.go(-2);</script>';
                }
                else{
                    echo '<script>alert("Erro ao postar/alterar nota!");';
                    echo ' window.history.back();</script>';
                }

                exit();
            }
        }

        public function excluirNota(int $idMateria, int $idUsuario){
            $notaModel = new notaModel();
            $nota = new notaModel(null, $idMateria, $idUsuario, null);

            $retorno = $notaModel->excluirNota($nota);

            if ($retorno){
                echo '<script>window.history.back();</script>';
            }
            else{
                echo '<script>alert("Erro ao excluir nota!");';
                echo ' window.history.back();</script>';
            }

            exit();
        }
    }
?>