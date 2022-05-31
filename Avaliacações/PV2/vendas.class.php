<?php
    class Vendas {
        private $id;
        private $nome;
        private $janeiro;
        private $fevereiro;
        private $marco;
        private $abril;
        private $maio;
        private $junho;
        private $julho;
        private $agosto;
        private $setembro;
        private $outubro;
        private $novembro;
        private $dezembro;
        private $fixo;
        private $dataContratacao;

        public function __construct($id, $nome, $janeiro, $fevereiro, $marco, $abril, $maio, $junho, $julho, $agosto, $setembro, $outubro, $novembro, $dezembro, $fixo, $dataContratacao) {
            $this->setId($id);
            $this->setNome($nome);
            $this->setJaneiro($janeiro);
            $this->setFevereiro($fevereiro);
            $this->setMarco($marco);
            $this->setAbril($abril);
            $this->setMaio($maio);
            $this->setJunho($junho);
            $this->setJulho($julho);
            $this->setAgosto($agosto);
            $this->setSetembro($setembro);
            $this->setOutubro($outubro);
            $this->setNovembro($novembro);
            $this->setDezembro($dezembro);
            $this->setFixo($fixo);
            $this->setDataContratacao($dataContratacao);
        }

        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getJaneiro() {
            return $this->janeiro;
        }

        public function getFevereiro() {
            return $this->fevereiro;
        }

        public function getMarco() {
            return $this->marco;
        }

        public function getAbril() {
            return $this->abril;
        }

        public function getMaio() {
            return $this->maio;
        }

        public function getJunho() {
            return $this->junho;
        }

        public function getJulho() {
            return $this->julho;
        }

        public function getAgosto() {
            return $this->agosto;
        }

        public function getSetembro() {
            return $this->setembro;
        }

        public function getOutubro() {
            return $this->outubro;
        }

        public function getNovembro() {
            return $this->novembro;
        }

        public function getDezembro() {
            return $this->dezembro;
        }

        public function getFixo() {
            return $this->fixo;
        }

        public function getDataContratacao() {
            return $this->dataContratacao;
        }

      
        public function setId($id) {
            $this->id = $id;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setJaneiro($janeiro) {
            $this->janeiro = $janeiro;
        }

        public function setFevereiro($fevereiro) {
            $this->fevereiro = $fevereiro;
        }

        public function setMarco($marco) {
            $this->marco = $marco;
        }

        public function setAbril($abril) {
            $this->abril = $abril;
        }

        public function setMaio($maio) {
            $this->maio = $maio;
        }

        public function setJunho($junho) {
            $this->junho = $junho;
        }

        public function setJulho($julho) {
            $this->julho = $julho;
        }

        public function setAgosto($agosto) {
            $this->agosto = $agosto;
        }

        public function setSetembro($setembro) {
            $this->setembro = $setembro;
        }

        public function setOutubro($outubro) {
            $this->outubro = $outubro;
        }

        public function setNovembro($novembro) {
            $this->novembro = $novembro;
        }

        public function setDezembro($dezembro) {
            $this->dezembro = $dezembro;
        }

        public function setFixo($fixo) {
            $this->fixo = $fixo;
        }

        public function setDataContratacao($dataContratacao) {
            $this->dataContratacao = $dataContratacao;
        }

        public function __toString() {
            return "[vendas] id: ".$this->id." | ".
            "nome: ".$this->nome." | ".
            "janeiro: ".$this->janeiro." | ".
            "fevereiro: ".$this->fevereiro." | ".
            "marco: ".$this->marco." | ".
            "abril: ".$this->abril." | ".
            "maio: ".$this->maio." | ".
            "junho: ".$this->junho." | ".
            "julho: ".$this->julho." | ".
            "agosto: ".$this->agosto." | ".
            "setembro: ".$this->setembro." | ".
            "outubro: ".$this->outubro." | ".
            "novembro: ".$this->novembro." | ".
            "dezembro: ".$this->dezembro." | ".
            "fixo: ".$this->fixo." | ".
            "dataContratacao: ".$this->dataContratacao;
        }

        public function totalVendas() {
            $soma = $this->janeiro + $this->fevereiro + $this->marco + $this->abril + $this->maio + $this->junho + $this->julho + $this->agosto + $this->setembro + $this->outubro + $this->novembro + $this->dezembro;
            return $soma;
        }

        public function tempoEmpresa() {
            $anoEmpresa = 0;
            $anoFuncionario = intval(substr($this->dataContratacao, 0, 4));
            $anoAtual = date("Y");
            $anoEmpresa = $anoAtual - $anoFuncionario;
            return $anoEmpresa;
        }

        public function bonusTempo() {
            $bonus = 0;
            $anoEmpresa = 0;
            $anoFuncionario = intval(substr($this->dataContratacao, 0, 4));
            $anoAtual = date("Y");
            $anoEmpresa = $anoAtual - $anoFuncionario;
            $bonus = $anoEmpresa * 50;
            return $bonus;
        }

        public function comissao() {
            $comissao = 0;
            $janeiro = $this->janeiro * 0.03;
            $fevereiro = $this->fevereiro * 0.03;
            $marco = $this->marco * 0.03;
            $abril = $this->abril * 0.03;
            $maio = $this->maio * 0.03;
            $junho = $this->junho * 0.03;
            $julho = $this->julho * 0.03;
            $agosto = $this->agosto * 0.03;
            $setembro = $this->setembro * 0.03;
            $outubro = $this->outubro * 0.03;
            $novembro = $this->novembro * 0.03;
            $dezembro = $this->dezembro * 0.03;
            $comissao = $janeiro + $fevereiro + $marco + $abril + $maio + $junho + $julho + $agosto + $setembro + $outubro + $novembro + $dezembro;
            return $comissao;
        }
    }
?>