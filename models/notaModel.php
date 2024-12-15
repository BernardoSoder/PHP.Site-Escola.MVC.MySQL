<?php
    require_once 'DAL/notaDAO.php';

    class notaModel {
        public ?int $idNota;
        public ?int $idUsuario;
        public ?int $idMateria;
        public ?float $valor;

        public function __construct(?int $idNota = null, ?int $idUsuario = null, ?int $idMateria = null,  ?float $valor = null) {
            $this->idNota = $idNota;
            $this->idUsuario = $idUsuario;
            $this->idMateria = $idMateria;
            $this->valor = $valor;
        }

        public function buscarNotaPorID(int $idUsuario, int $idMateria){
            $notaDAO = new notaDAO();

            $nota = $notaDAO->buscarNotaPorID($idUsuario, $idMateria);

            if (!empty($nota)) {
                $nota = new self($nota['id_nota'], $nota['id_usuario'], $nota['id_materia'], $nota['valor']);
            }
            else {
                $nota = null;
            }
            
            return $nota;

        }

        public function editarNota(notaModel $nota){
            $notaDAO = new notaDAO();

            return $notaDAO->editarNota($nota);
        }

        public function excluirNota(notaModel $nota){
            $notaDAO = new notaDAO();

            return $notaDAO->excluirNota($nota);
        }

        public function mediaNota(int $idUsuario){
            $notaDAO = new notaDAO();

            $media = $notaDAO->mediaNota($idUsuario);
            $media = number_format($media['media_notas'], 2);

            return $media;
        }

    }
?>