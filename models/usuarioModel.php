<?php
    require_once 'DAL/usuarioDAO.php';

    class usuarioModel {
        public ?int $idUsuario;
        public ?int $idTipoUsuario;
        public ?string $nome;
        public ?string $email;
        public ?string $senha;

        public function __construct(?int $idUsuario = null, ?int $idTipoUsuario = null, ?string $nome = null, ?string $email = null, ?string $senha = null) {
            $this->idUsuario = $idUsuario; 
            $this->idTipoUsuario = $idTipoUsuario;
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
        }

        public function buscarUsuario(usuarioModel $usuario){
            $usuarioDAO = new usuarioDAO();

            return $usuarioDAO->buscarUsuario($usuario);
        }

        public function cadastrarUsuario(usuarioModel $usuario){
            $usuarioDAO = new usuarioDAO();

            return $usuarioDAO->cadastrarUsuario($usuario);
        }

        public function buscarEmailUsuario(usuarioModel $usuario){
            $usuarioDAO = new usuarioDAO();

            return $usuarioDAO->buscarEmailUsuario($usuario);
        }

        public function buscarUsuarioPorID(int $idUsuario){
            $usuarioDAO = new usuarioDAO();

            $usuario = $usuarioDAO->buscarUsuarioPorID($idUsuario);
            $usuario = new self($usuario['id_usuario'], $usuario['id_tipo_usuario'], $usuario['nome'], $usuario['email'], $usuario['senha']);

            return $usuario;
        }

        public function alterarNome(usuarioModel $nomeNovo){
            $usuarioDAO = new usuarioDAO();

            return $usuarioDAO->alterarNome($nomeNovo);
        }

        public function alterarEmail(usuarioModel $emailNovo){
            $usuarioDAO = new usuarioDAO();

            return $usuarioDAO->alterarEmail($emailNovo);
        }

        public function alterarSenha(usuarioModel $senhaNova){
            $usuarioDAO = new usuarioDAO();

            return $usuarioDAO->alterarSenha($senhaNova);
        }
        
        public function buscarUsuarios(){
            $usuarioDAO = new usuarioDAO();

            $usuarios = $usuarioDAO->buscarUsuarios();

                foreach ($usuarios as $chave => $usuario) {
                    $usuarios[$chave] = new usuarioModel($usuario['id_usuario'], $usuario['id_tipo_usuario'], $usuario['nome'], $usuario['email'], $usuario['senha']);
            }

            return $usuarios;
        }

        public function excluirUsuario(usuarioModel $idUsuario){
            $usuarioDAO = new usuarioDAO();

            return $usuarioDAO->excluirUsuario($idUsuario);
        }

        public function editarUsuario(usuarioModel $usuario){
            $usuarioDAO = new usuarioDAO();

            return $usuarioDAO->editarUsuario($usuario);
        }

        public function editarSenhaUsuario(usuarioModel $senhaNova){
            $usuarioDAO = new usuarioDAO();

            return $usuarioDAO->editarSenhaUsuario($senhaNova);
        }

        public function buscarAlunos(){
            $usuarioDAO = new usuarioDAO();

            $usuarios = $usuarioDAO->buscarAlunos();
            
                foreach ($usuarios as $chave => $usuario) {
                    $usuarios[$chave] = new usuarioModel($usuario['id_usuario'], $usuario['id_tipo_usuario'], $usuario['nome'], $usuario['email'], $usuario['senha']);
            }

            return $usuarios;
        }
    }
?>