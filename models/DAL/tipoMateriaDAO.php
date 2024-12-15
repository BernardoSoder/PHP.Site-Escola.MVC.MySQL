<?php
    require_once "conexao.php";

    class tipoMateriaDAO{
        public function buscarTiposMateria(){
            $conexao = (new conexao)->getConexao();
            $sql = "SELECT * FROM tipo_materia;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function buscarTipoMateria(int $idTipoMateria){
            $conexao = (new conexao)->getConexao();
            $sql = "SELECT * FROM tipo_materia WHERE id_tipo_materia = :id_tipo_materia;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id_tipo_materia', $idTipoMateria);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function cadastrarTipoMateria(tipoMateriaModel $tipoMateria){
            $conexao = (new conexao)->getConexao();
            $sql = "INSERT INTO tipo_materia VALUES(null, :descricao);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':descricao', $tipoMateria->descricao);
            return $stmt->execute();
        }

        public function excluirTipoMateria(tipoMateriaModel $tipoMateria) {
            $conexao = (new conexao)->getConexao();
            $sql1 = "DELETE FROM tipo_materia WHERE id_tipo_materia = :idTipoMateria;";
            $sql2 = "UPDATE materia SET id_tipo_materia = 1 WHERE id_tipo_materia = :idTipoMateria;";
        
            $stmt1 = $conexao->prepare($sql1);
            $stmt1->bindValue(':idTipoMateria', $tipoMateria->idTipoMateria);
            $stmt1->execute();
        
            $stmt2 = $conexao->prepare($sql2);
            $stmt2->bindValue(':idTipoMateria', $tipoMateria->idTipoMateria);
            return $stmt2->execute();
        }

        public function editarTipoMateria(tipoMateriaModel $tipoMateria){
            $conexao = (new conexao)->getConexao();
            $sql = "UPDATE tipo_materia SET descricao = :descricao WHERE id_tipo_materia = :idTipoMateria;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":idTipoMateria", $tipoMateria->idTipoMateria);
            $stmt->bindValue(':descricao', $tipoMateria->descricao);
            return $stmt->execute();

        }
    }
?>

