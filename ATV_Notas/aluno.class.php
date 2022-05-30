<?php
    class Aluno {
        private $id;
        private $nome;
        private $n1;
        private $n2;
        private $n3;
        private $n4;

        public function __construct($id, $nome, $n1, $n2, $n3, $n4) {
            $this->id = $id;
            $this->nome = $nome;
            $this->n1 = $n1;
            $this->n2 = $n2;
            $this->n3 = $n3;
            $this->n4 = $n4;
        }

        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getN1() {
            return $this->n1;
        }

        public function getN2() {
            return $this->n2;
        }

        public function getN3() {
            return $this->n3;
        }

        public function getN4() {
            return $this->n4;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setN1($n1) {
            $this->n1 = $n1;
        }

        public function setN2($n2) {
            $this->n2 = $n2;
        }

        public function setN3($n3) {
            $this->n3 = $n3;
        }

        public function setN4($n4) {
            $this->n4 = $n4;
        }   

        public function getMedia() {
            return ($this->n1 + $this->n2 + $this->n3 + $this->n4) / 4;
        }

        public function getSituacao() {
            if ($this->getMedia() >= 6) {
                return "Aprovado";
            } else {
                return "Reprovado";
            }
        }
    }
?>