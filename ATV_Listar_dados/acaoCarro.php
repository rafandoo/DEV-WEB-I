<?php
    include_once "conf/default.inc.php";
    include_once "conf/Conexao.php";
    include_once "carro.class.php";

    $acao = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $acao = $_POST["acao"];
    } else {
        $acao = $_GET["acao"];
    }

    switch ($acao) {
        case "Cadastrar":
            insertCarro();
            break;
    }

    function buildCarro() {
        $carro = new Carro($_POST["id"], $_POST["nome"], $_POST["valor"], $_POST["km"], $_POST["dataFabricacao"]);
        return $carro;
    }

    function insertCarro() {
        $pdo = Conexao::getInstance();
        $carro = buildCarro();
        $stmt = $pdo->prepare("INSERT INTO carro (nome, valor, km, dataFabricacao) VALUES (:nome, :valor, :km, :dataFabricacao)");
        $stmt->bindValue(":nome", $carro->getNome());
        $stmt->bindValue(":valor", $carro->getValor());
        $stmt->bindValue(":km", $carro->getKm());
        $stmt->bindValue(":dataFabricacao", $carro->getDataFabricacao());
        $stmt->execute();
        header("Location: index.php");
    }
?> 