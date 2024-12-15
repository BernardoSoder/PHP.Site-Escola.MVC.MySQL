<?php
    require_once "../models/usuarioModel.php";
    
    class usuarioController {
        public function validarUsuario(string $email, string $senha){
            $email = str_replace(" ", "", $email);
            $senha = md5(str_replace(" ", "", $senha));

            $usuarioModel = new usuarioModel();
            $usuario = new usuarioModel(null, null, null, $email, $senha);

            $retorno = $usuarioModel->buscarUsuario($usuario);

            session_start();
            if ($retorno) {
                $_SESSION['esta_logado'] = True;
                $_SESSION['id_tipo_usuario'] = $retorno['id_tipo_usuario'];
                $_SESSION['id_usuario'] = $retorno['id_usuario'];
                
                    header('Location: ../views/principal.php');
            }
            else {
                header('Location: ../views/login.php');
            }
            
            exit();
        }
        
        public function cadastrarUsuario(int $idTipoUsuario, string $nome, string $email, string $senha, string $senhaAdmin){
            $usuarioModel = new UsuarioModel();
            $senhaAtualDB = $usuarioModel->buscarUsuarioPorID($_SESSION['id_usuario']);
            $senhaAdmin = md5(str_replace(" ", "", $senhaAdmin));
            if ($senhaAdmin != $senhaAtualDB->senha){
                echo '<script>alert("Senha atual incorreta!");';
                echo ' window.history.back();</script>';
            }
            else{
            $email = str_replace(" ", "", $email);
            $senha = md5(str_replace(" ", "", $senha));
            $usuario = new usuarioModel(null, $idTipoUsuario, $nome, $email, $senha);

            if ($usuarioModel->buscarEmailUsuario($usuario)){
                echo '<script>alert("Esse e-mail já está sendo utilizado por uma conta!");';
                echo ' window.history.back();</script>';      
            }
            else{
                
                $retorno = $usuarioModel->cadastrarUsuario($usuario);

                if($retorno){
                    header('Location: ../views/usuario/listarUsuarios.php');
                }
                else{
                    echo '<script>alert("Erro ao cadastrar usuário!");';
                    echo ' window.history.back();</script>';
                }
                
                exit();
            }
            }
        }

        public function alterarNome(string $nome, string $senha, int $idUsuario){
            $senha = md5(str_replace(" ", "", $senha));
            $usuarioModel = new usuarioModel();
            $senhaAtualDB = $usuarioModel->buscarUsuarioPorID($_SESSION['id_usuario']);
            if ($senha != $senhaAtualDB->senha){
                echo '<script>alert("Senha atual incorreta!");';
                echo ' window.history.back();</script>';
            }
            else{
                $nomeNovo = new usuarioModel($idUsuario, null, $nome, null, null);

                $retorno = $usuarioModel->alterarNome($nomeNovo);

                if($retorno){
                    header('Location: ../views/usuario/informacoesUsuario.php');
                }
                else{
                    echo '<script>alert("Erro ao alterar credencial!");';
                    echo ' window.history.back();</script>';
                }
                
                exit();
            }
        }

        public function alterarEmail(string $email, string $confirmarEmail, string $senha, int $idUsuario){
            $email = str_replace(" ", "", $email);
            $confirmarEmail = str_replace(" ", "", $confirmarEmail);
            $senha = md5(str_replace(" ", "", $senha));
            $usuarioModel = new UsuarioModel();
            $senhaAtualDB = $usuarioModel->buscarUsuarioPorID($_SESSION['id_usuario']);
            

            if ($email != $confirmarEmail){
                echo '<script>alert("E-mails não coincidem!");';
                echo ' window.history.back();</script>';        
            }
            elseif($senha != $senhaAtualDB->senha){
                echo '<script>alert("Senha atual incorreta!");';
                echo ' window.history.back();</script>';
            }
            else{
                $emailNovo = new usuarioModel($idUsuario, null, null, $email, null);

                $retorno = $usuarioModel->alterarEmail($emailNovo);

                if($retorno){
                    header('Location: ../views/usuario/informacoesUsuario.php');
                }
                else{
                    echo '<script>alert("Erro ao alterar credencial!");';
                    echo ' window.history.back();</script>';
                }
                
                exit();
            }
        }

        public function alterarSenha(string $senhaAtual, string $senha, string $confirmarSenha, int $idUsuario){
            $senhaAtual = md5(str_replace(" ", "", $senhaAtual));
            $senha = md5(str_replace(" ", "", $senha));
            $confirmarSenha = md5(str_replace(" ", "", $confirmarSenha));
            $usuarioModel = new UsuarioModel();
            $senhaAtualDB = $usuarioModel->buscarUsuarioPorID($_SESSION['id_usuario']);

            if ($senha != $confirmarSenha){
                echo '<script>alert("Senhas não coincidem!");';
                echo ' window.history.back();</script>';
            }
            elseif ($senhaAtual != $senhaAtualDB->senha){
                    echo '<script>alert("Senha atual incorreta!");';
                    echo ' window.history.back();</script>';    
                }
            else{
                $senhaNova = new usuarioModel($idUsuario, null, null, null, $senha);

                $retorno = $usuarioModel->alterarSenha($senhaNova);

                if($retorno){
                    header('Location: ../views/usuario/alterarCredenciais.php');
                }
                else{
                    echo '<script>alert("Erro ao alterar credencial!");';
                    echo ' window.history.back();</script>';
                }
                
                exit();
                }
            }
        

        public function excluirUsuario(int $idUsuario){
            if($idUsuario == 1){
                echo '<script>alert("Este usuário não pode ser excluido!");';
                echo ' window.history.back();</script>';
            }
            else{
            $usuarioModel = new usuarioModel();
            $idUsuario = new usuarioModel($idUsuario, null, null, null, null);

            $retorno = $usuarioModel->excluirUsuario($idUsuario);

            if($retorno){
                header('Location: ../views/usuario/listarUsuarios.php');
            }
            else{
                echo '<script>alert("Erro ao excluir usuário!");';
                echo ' window.history.back();</script>';
            }
        }
        exit();
        
        }
        
        public function editarUsuario(string $nome, string $email, int $idTipoUsuario, string $senha, int $idUsuario){
            $email = str_replace(" ", "", $email);
            $senha = md5(str_replace(" ", "", $senha));
            $usuarioModel = new usuarioModel();
            $senhaAtualDB = $usuarioModel->buscarUsuarioPorID($_SESSION['id_usuario']);

            if ($senha != $senhaAtualDB->senha){
                echo '<script>alert("Senha atual incorreta!");';
                echo ' window.history.back();</script>';
            }
            elseif($idUsuario == 1){
                echo '<script>alert("Este usuário não pode ser alterado e/ou editado!");';
                echo ' window.history.back();</script>';
            }
            else{
                $usuario = new usuarioModel($idUsuario, $idTipoUsuario, $nome, $email, null);

                $retorno = $usuarioModel->editarUsuario($usuario);

                if($retorno){
                    header('Location: ../views/usuario/listarUsuarios.php');
                }
                else{
                    echo '<script>alert("Erro ao editar usuário!");';
                    echo ' window.history.back();</script>';
                }

                exit();
            }
        }

        public function editarSenhaUsuario(string $senha, string $confirmarSenha, string $senhaAdmin, int $idUsuario){
            $senha = md5(str_replace(" ", "", $senha));
            $confirmarSenha = md5(str_replace(" ", "", $confirmarSenha));
            $senhaAdmin = md5(str_replace(" ", "", $senhaAdmin));
            $usuarioModel = new usuarioModel();
            $senhaAtualDB = $usuarioModel->buscarUsuarioPorID($_SESSION['id_usuario']);

            if ($senha != $confirmarSenha){
                echo '<script>alert("Senhas não coincidem!");';
                echo ' window.history.back();</script>';
            }
            elseif($idUsuario == 1){
                echo '<script>alert("Este usuário não pode ser alterado e/ou editado!");';
                echo ' window.history.back();</script>';
            }
            elseif ($senhaAdmin != $senhaAtualDB->senha){
                echo '<script>alert("Senha atual incorreta!");';
                echo ' window.history.back();</script>';
            }
            else{
                $senhaNova = new usuarioModel($idUsuario, null, null, null, $senha);

                $retorno = $usuarioModel->editarSenhaUsuario($senhaNova);

                if($retorno){
                    header('Location: ../views/usuario/listarUsuarios.php');
                }
                else{
                    echo '<script>alert("Erro ao editar senha do usuário!");';
                    echo ' window.history.back();</script>';
                }

                exit();
            }

        }
            
    }   
?>