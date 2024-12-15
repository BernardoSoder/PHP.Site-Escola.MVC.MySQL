<?php
    require_once 'DAL/tipoMateriaDAO.php';

    class tipoMateriaModel {
        public ?int $idTipoMateria;
        public ?string $descricao;

        public function __construct(?int $idTipoMateria = null, ?string $descricao = null) {
            $this->idTipoMateria = $idTipoMateria;
            $this->descricao = $descricao;
        }

        public function buscarTiposMateria() {
            $tipoMateriaDAO = new tipoMateriaDAO();

            $tiposMateria = $tipoMateriaDAO->buscarTiposMateria();

            foreach ($tiposMateria as $chave => $tipoMateria) {
                $tiposMateria[$chave] = new self($tipoMateria['id_tipo_materia'], $tipoMateria['descricao']);
            }

            return $tiposMateria;
        }

        public function tipoMateria(int $idTipoMateria) {
            $tipoMateriaDAO = new tipoMateriaDAO();

            $tipoMateria = $tipoMateriaDAO->buscarTipoMateria($idTipoMateria);
            if (!empty($tipoMateria)){
                $tipoMateria = new self($tipoMateria['id_tipo_materia'], $tipoMateria['descricao']);
            }
            else{
                $tipoMateria = null;
            }

            return $tipoMateria;
        }

        public function cadastrarTipoMateria(tipoMateriaModel $tipoMateria){
            $tipoMateriaDAO = new tipoMateriaDAO();

            return $tipoMateriaDAO->cadastrarTipoMateria($tipoMateria);
        }

        public function excluirTipoMateria(tipoMateriaModel $tipoMateria){
            $tipoMateriaDAO = new tipoMateriaDAO();

            return $tipoMateriaDAO->excluirTipoMateria($tipoMateria);
        }

        public function editarTipoMateria(tipoMateriaModel $tipoMateria){
            $tipoMateriaDAO = new tipoMateriaDAO();

            return $tipoMateriaDAO->editarTipoMateria($tipoMateria);
        }
    }
?>