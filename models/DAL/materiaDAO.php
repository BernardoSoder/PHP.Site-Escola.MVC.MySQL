<?php
    require_once 'conexao.php';

    class materiaDAO{
        public function cadastrarMateria(materiaModel $materia){
            $conexao = (new conexao)->getConexao();
            $sql = "INSERT INTO materia VALUES(null, :idTipoMateria, :descricao);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idTipoMateria', $materia->idTipoMateria);
            $stmt->bindValue(':descricao', $materia->descricao);
            return $stmt->execute();
        }

        public function buscarMaterias(){
            $conexao = (new conexao)->getConexao();
            $sql = "SELECT * FROM materia;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function excluirMateria(materiaModel $materia) {
            $conexao = (new conexao)->getConexao();
            $sql1 = "DELETE FROM materia WHERE id_materia = :idMateria;";
            $sql2 = "DELETE FROM nota WHERE id_materia = :idMateria;";
        
            $stmt1 = $conexao->prepare($sql1);
            $stmt1->bindValue(':idMateria', $materia->idMateria);
            $stmt1->execute();
        
            $stmt2 = $conexao->prepare($sql2);
            $stmt2->bindValue(':idMateria', $materia->idMateria);
            return $stmt2->execute();
        }

        public function buscarMateriaPorID(int $idMateria){

        $conexao = (new conexao())->getConexao();
        $sql = "SELECT * FROM materia WHERE id_materia = :idMateria;";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":idMateria", $idMateria);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

        }

        public function editarMateria(materiaModel $materia){
            $conexao = (new conexao)->getConexao();
            $sql = "UPDATE materia SET id_tipo_materia = :idTipoMateria, descricao = :descricao WHERE id_materia = :idMateria;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":idTipoMateria", $materia->idTipoMateria);
            $stmt->bindValue(":descricao", $materia->descricao);
            $stmt->bindValue(":idMateria", $materia->idMateria);
            return $stmt->execute();

        }

        public function buscarMateriasPorTipoMateria(int $idTipoMateria){
            $conexao = (new conexao)->getConexao();
            $sql = "SELECT * FROM materia WHERE id_tipo_materia = :idTipoMateria;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":idTipoMateria", $idTipoMateria);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>