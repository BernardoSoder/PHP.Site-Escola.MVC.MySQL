<?php
    require_once 'DAL/materiaDAO.php';

    class materiaModel {
        public ?int $idMateria;
        public ?int $idTipoMateria;
        public ?string $descricao;

        public function __construct(?int $idMateria = null, ?int $idTipoMateria = null, ?string $descricao = null) {
            $this->idMateria = $idMateria;
            $this->idTipoMateria = $idTipoMateria;
            $this->descricao = $descricao;
        }

        public function cadastrarMateria(materiaModel $materiaModel){
            $materiaDAO = new materiaDAO();

            return $materiaDAO->cadastrarMateria($materiaModel);
        }

        public function buscarMaterias(){
            $materiaDAO = new materiaDAO();

            $materias = $materiaDAO->buscarMaterias();

            foreach ($materias as $chave => $materia) {
                $materias[$chave] = new materiaModel($materia['id_materia'], $materia['id_tipo_materia'], $materia['descricao']);
            }

            return $materias;
        }

        public function excluirMateria(materiaModel $materia){
            $materiaDAO = new materiaDAO();

            return $materiaDAO->excluirMateria($materia);
        }

        public function buscarMateriaPorID(int $idMateria){
            $materiaDAO = new materiaDAO();

            $materia = $materiaDAO->buscarMateriaPorID($idMateria);
            $materia = new self($materia['id_materia'], $materia['id_tipo_materia'], $materia['descricao']);

            return $materia;
            
        }

        public function editarMateria(materiaModel $materia){
            $materiaDAO = new materiaDAO();

            return $materiaDAO->editarMateria($materia);
        }

        public function buscarMateriasPorTipoMateria(int $idTipoMateria){
            $materiaDAO = new materiaDAO();

            $materias = $materiaDAO->buscarMateriasPorTipoMateria($idTipoMateria);
            foreach ($materias as $chave => $materia) {
                $materias[$chave] = new materiaModel($materia['id_materia'], $materia['id_tipo_materia'], $materia['descricao']);
            }

            return $materias;
        }
    }
?>