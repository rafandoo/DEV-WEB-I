<?php

class Carro {
	private $id;
	private $nome;
	private $valor;
	private $km;
	private $dataFabricacao;

    public function __construct($id, $nome, $valor, $km, $dataFabricacao) {
		$this->id = $id;
		$this->nome = $nome;
		$this->valor = $valor;
		$this->km = $km;
		$this->dataFabricacao = $dataFabricacao;
	}


	public function setId($id) {
		if ($id >= 0) {
			$this->id = $id;
		}
	}

	public function getId() {
		return $this->id;
	}

	public function setNome($nome) {
		if (strlen($nome) > 0) {
			$this->nome = $nome;
		}
	}

	public function getNome() {
		return $this->nome;
	}

	public function setValor($valor) {
		if ($valor >= 0) {
			$this->valor = $valor;
		}
	}

	public function getValor() {
		return $this->valor;
	}

	public function setKm($km) {
		if ($km >= 0) {
			$this->km = $km;
		}
	}

	public function getKm() {
		return $this->km;
	}

	public function setDataFabricacao($dataFabricacao) {
		if (strlen($dataFabricacao) > 0) {
			$this->dataFabricacao = $dataFabricacao;
		}
	}

	public function getDataFabricacao() {
		return $this->dataFabricacao;
	}

	public function __toString() {
		return "Id: " . $this->id . "<br>" .
				"Nome: " . $this->nome . "<br>" .
				"Valor: " . $this->valor . "<br>" .
				"Km: " . $this->km . "<br>" .
				"Data de fabricação: " . $this->dataFabricacao . "<br>";
	}
}
?>