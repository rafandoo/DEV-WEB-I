<?php
    include_once "conf/default.inc.php";
    include_once "conf/Conexao.php";
    include_once "vendas.class.php";

    $acao = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $acao = $_POST['acao'];
    } else {
        $acao = $_GET['acao'];
    }


    switch ($acao) {
        case 'Cadastrar':
            insertVendas(buildVendas($_POST["id"], $_POST["nome"], $_POST["janeiro"], $_POST["fevereiro"], $_POST["marco"], $_POST["abril"], $_POST["maio"], $_POST["junho"], $_POST["julho"], $_POST["agosto"], $_POST["setembro"], $_POST["outubro"], $_POST["novembro"], $_POST["dezembro"], $_POST["fixo"], $_POST["dataContratacao"]));
            break;
        case 'Excluir':
            deleteVendas($_GET["id"]);
            break;
        default:
            break;
    }

    function buildVendas($id, $nome, $janeiro, $fevereiro, $marco, $abril, $maio, $junho, $julho, $agosto, $setembro, $outubro, $novembro, $dezembro, $fixo, $dataContratacao) {
        $vendas = new Vendas($id, $nome, $janeiro, $fevereiro, $marco, $abril, $maio, $junho, $julho, $agosto, $setembro, $outubro, $novembro, $dezembro, $fixo, $dataContratacao);
        return $vendas;
    }

    function insertVendas($vendas) {
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("INSERT INTO vendas (nome, janeiro, fevereiro, marco, abril, maio, junho, julho, agosto, setembro, outubro, novembro, dezembro, fixo, dataContratacao) VALUES (:nome, :janeiro, :fevereiro, :marco, :abril, :maio, :junho, :julho, :agosto, :setembro, :outubro, :novembro, :dezembro, :fixo, :dataContratacao)");
        $stmt->bindValue(':nome', $vendas->getNome());
        $stmt->bindValue(':janeiro', $vendas->getJaneiro());
        $stmt->bindValue(':fevereiro', $vendas->getFevereiro());
        $stmt->bindValue(':marco', $vendas->getMarco());
        $stmt->bindValue(':abril', $vendas->getAbril());
        $stmt->bindValue(':maio', $vendas->getMaio());
        $stmt->bindValue(':junho', $vendas->getJunho());
        $stmt->bindValue(':julho', $vendas->getJulho());
        $stmt->bindValue(':agosto', $vendas->getAgosto());
        $stmt->bindValue(':setembro', $vendas->getSetembro());
        $stmt->bindValue(':outubro', $vendas->getOutubro());
        $stmt->bindValue(':novembro', $vendas->getNovembro());
        $stmt->bindValue(':dezembro', $vendas->getDezembro());
        $stmt->bindValue(':fixo', $vendas->getFixo());
        $stmt->bindValue(':dataContratacao', $vendas->getDataContratacao());
        var_dump($stmt);
        $stmt->execute();
        header("Location: index.php");
    }

    function deleteVendas($id) {
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("DELETE FROM vendas WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        header("Location: index.php");
    }
?>