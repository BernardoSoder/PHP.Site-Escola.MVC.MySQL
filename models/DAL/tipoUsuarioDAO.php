<?php
    require_once "conexao.php";

    class tipoUsuarioDAO{
        public function buscarTiposUsuario(){
            $conexao = (new conexao)->getConexao();
            $sql = "SELECT * FROM tipo_usuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function buscarTipoUsuario(int $idTipoUsuario){
            $conexao = (new conexao)->getConexao();
            $sql = "SELECT * FROM tipo_usuario WHERE id_tipo_usuario = :id_tipo_usuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id_tipo_usuario', $idTipoUsuario);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>

