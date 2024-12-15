<?php
    class conexao {
        public PDO $conexao;

        public function __construct() {
            $this->conexao = new PDO('mysql:host=localhost;dbname=escola_inf14', 'root', '');
        }

        public function getConexao() {
            return $this->conexao;
        }
    }
?>