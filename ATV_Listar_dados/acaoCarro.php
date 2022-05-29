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
            insertCarro(buildCarro($_POST["id"] ,$_POST["nome"], $_POST["valor"], $_POST["km"], $_POST["dataFabricacao"]));
            break;
        case "Excluir":
            deleteCarro();
            break;
    }

    function buildCarro ($id, $nome, $valor, $km, $dataFabricacao) {
        $carro = new Carro($id, $nome, $valor, $km, $dataFabricacao);
        return $carro;
    }

    function insertCarro($carro) {
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("INSERT INTO carro (nome, valor, km, dataFabricacao) VALUES (:nome, :valor, :km, :dataFabricacao)");
        $stmt->bindValue(":nome", $carro->getNome());
        $stmt->bindValue(":valor", $carro->getValor());
        $stmt->bindValue(":km", $carro->getKm());
        $stmt->bindValue(":dataFabricacao", $carro->getDataFabricacao());
        $stmt->execute();
        header("Location: index.php");
    }

    function deleteCarro() {
        $pdo = Conexao::getInstance();
        $id = $_GET["id"];
        $stmt = $pdo->prepare("DELETE FROM carro WHERE id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        header("Location: index.php");
    }

    function updateCarro($carro) {
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("UPDATE carro SET nome = :nome, valor = :valor, km = :km, dataFabricacao = :dataFabricacao WHERE id = :id");
        $stmt->bindValue(":nome", $carro->getNome());
        $stmt->bindValue(":valor", $carro->getValor());
        $stmt->bindValue(":km", $carro->getKm());
        $stmt->bindValue(":dataFabricacao", $carro->getDataFabricacao());
        $stmt->bindValue(":id", $carro->getId());
        $stmt->execute();
        header("Location: index.php");
    }
?>