<?php
    require_once 'conexao.php';

    class notaDAO{
        public function buscarNotaPorID(int $idUsuario, int $idMateria){
            $conexao = (new conexao)->getConexao();
            $sql = "SELECT * FROM nota WHERE id_usuario = :idUsuario AND id_materia = :idMateria;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idUsuario', $idUsuario);
            $stmt->bindParam(':idMateria', $idMateria);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function editarNota(notaModel $nota){
            $conexao = (new conexao)->getConexao();
            $sql_verifica = "SELECT COUNT(*) AS count FROM nota WHERE id_usuario = :idUsuario AND id_materia = :idMateria;";
            #nem vem falar q foi gpt aprendemo count na aula de sexta dia 12/07
            $stmt_verifica = $conexao->prepare($sql_verifica);
            $stmt_verifica->bindValue(':idUsuario', $nota->idUsuario);
            $stmt_verifica->bindValue(':idMateria', $nota->idMateria);
            $stmt_verifica->execute();
            $result_verifica = $stmt_verifica->fetch(PDO::FETCH_ASSOC);
    
            if ($result_verifica['count'] > 0) {
                $sql = "UPDATE nota SET valor = :valor WHERE id_usuario = :idUsuario AND id_materia = :idMateria;";
            } 
            else {
                $sql = "INSERT INTO nota (id_usuario, id_materia, valor) VALUES (:idUsuario, :idMateria, :valor);";
            }

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idUsuario', $nota->idUsuario);
            $stmt->bindValue(':idMateria', $nota->idMateria);
            $stmt->bindValue(':valor', $nota->valor);
            return $stmt->execute();
        }

        public function excluirNota(notaModel $nota){
            $conexao = (new conexao)->getConexao();
            $sql = "DELETE FROM nota WHERE id_usuario = :idUsuario and id_materia = :idMateria;";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue('idUsuario', $nota->idUsuario);
            $stmt->bindValue('idMateria', $nota->idMateria);
            return $stmt->execute();
        }

        public function mediaNota(int $idUsuario){
            $conexao = (new conexao)->getConexao();
            $sql = "SELECT SUM(valor) / COUNT(*) AS media_notas FROM nota WHERE id_usuario = :idUsuario";
            
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idUsuario', $idUsuario);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>