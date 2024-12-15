<?php
    require_once "conexao.php";
    
    class usuarioDAO{
        public function buscarUsuario(usuarioModel $usuario){
            $conexao = (new conexao())->getConexao();
            $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindvalue(':email', $usuario->email);
            $stmt->bindValue(':senha', $usuario->senha);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $retorno;    
        }

        public function cadastrarUsuario(usuarioModel $usuario){
            $conexao = (new conexao())->getConexao();
            $sql = "INSERT INTO usuario values(null, :idTipoUsuario, :nome, :email, :senha);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idTipoUsuario', $usuario->idTipoUsuario);
            $stmt->bindValue(':nome', $usuario->nome);
            $stmt->bindValue(':email', $usuario->email);
            $stmt->bindValue(':senha', $usuario->senha);
            $retorno = $stmt->execute();
            return $retorno;
        }

        public function buscarEmailUsuario(usuarioModel $usuario){
            $conexao = (new conexao())->getConexao();
            $sql = "SELECT email FROM usuario WHERE email = :email;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":email", $usuario->email);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function buscarUsuarioPorID(int $idUsuario){
            $conexao = (new conexao())->getConexao();
            $sql = "SELECT * FROM usuario WHERE id_usuario = :idUsuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":idUsuario", $idUsuario);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function alterarNome(usuarioModel $nomeNovo){
            $conexao = (new conexao)->getConexao();
            $sql = "UPDATE usuario SET nome = :nome WHERE id_usuario = :idUsuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nomeNovo->nome);
            $stmt->bindValue(':idUsuario', $nomeNovo->idUsuario);
            return $stmt->execute();
        }

        public function alterarEmail(usuarioModel $emailNovo){
            $conexao = (new conexao)->getConexao();
            $sql = "UPDATE usuario SET email = :email WHERE id_usuario = :idUsuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":email", $emailNovo->email);
            $stmt->bindValue(':idUsuario', $emailNovo->idUsuario);
            return $stmt->execute();
        }

        public function alterarSenha(usuarioModel $senhaNova){
            $conexao = (new conexao)->getConexao();
            $sql = "UPDATE usuario SET senha = :senha WHERE id_usuario = :idUsuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":senha", $senhaNova->senha);
            $stmt->bindValue(':idUsuario', $senhaNova->idUsuario);
            return $stmt->execute();
        }

        public function buscarUsuarios(){
            $conexao = (new conexao)->getConexao();
            $sql = "SELECT * FROM usuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function excluirUsuario(usuarioModel $idUsuario){
            $conexao = (new conexao)->getConexao();
            $sql = "DELETE FROM usuario WHERE id_usuario = :idUsuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":idUsuario", $idUsuario->idUsuario);
            return $stmt->execute();
        }

        public function editarUsuario(usuarioModel $usuario){
            $conexao = (new conexao)->getConexao();
            $sql = "UPDATE usuario SET id_tipo_usuario = :idTipoUsuario, nome = :nome, email = :email WHERE id_usuario = :idUsuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idTipoUsuario', $usuario->idTipoUsuario);
            $stmt->bindValue(':nome', $usuario->nome);
            $stmt->bindValue(':email', $usuario->email);
            $stmt->bindValue(':idUsuario', $usuario->idUsuario);
            return $stmt->execute();
        }

        public function editarSenhaUsuario(usuarioModel $senhaNova){
            $conexao = (new conexao)->getConexao();
            $sql = "UPDATE usuario SET senha = :senha WHERE id_usuario = :idUsuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':senha', $senhaNova->senha);
            $stmt->bindValue(':idUsuario', $senhaNova->idUsuario);
            return $stmt->execute();
        }

        public function buscarAlunos(){
            $conexao = (new conexao)->getConexao();
            $sql = "SELECT * FROM usuario WHERE id_tipo_usuario = 2;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>