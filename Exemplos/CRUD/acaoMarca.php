<?php
    require_once "conf/Conexao.php";
    include_once "conf/default.inc.php";
    include_once "marca.class.php";

    $acao = "";

    switch($_SERVER['REQUEST_METHOD']){
        case 'GET' : $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
        case 'POST' : $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
    }

    if ($acao == 'salvar') {
        insertMarca(buildMarca(0, $_POST['descricao']));
    } else if ($acao == 'excluir') {
        deleteMarca(buildMarca($_GET['codigo'], ""));
    } else if ($acao == 'editar') {
        updateMarca(buildMarca($_POST['codigo'], $_POST['descricao']));
    }


    function buildMarca($codigo, $descricao){
        return (new marca($codigo, $descricao));
    }

    function insertMarca($marca) {
        $pdo = Conexao::getInstance();
        $stmt = $pdo -> prepare("INSERT INTO marca (descricao) VALUES (:descricao)");
        $stmt -> bindParam(':descricao', $marca->getDescricao(), PDO::PARAM_STR);
        $stmt -> execute();
        header("location:index.php");
    }

    function deleteMarca($marca) {
        $pdo = Conexao::getInstance();
        $stmt = $pdo -> prepare("DELETE FROM marca WHERE codigo = (:codigo)");
        $stmt -> bindParam(':codigo', $marca->getCodigo(), PDO::PARAM_STR);
        $stmt -> execute();
        header("location:index.php");
    }

    function updateMarca($marca) {
        $pdo = Conexao::getInstance();
        $stmt = $pdo -> prepare("UPDATE marca SET descricao = :descricao WHERE codigo = :codigo");
        $stmt -> bindParam(':codigo', $marca->getCodigo(), PDO::PARAM_STR);
        $stmt -> bindParam(':descricao', $marca->getDescricao(), PDO::PARAM_STR);
        $stmt -> execute();
        header("location:index.php");
    }

    function getMarca($codigo) {
        $pdo = Conexao::getInstance();
        $stmt = $pdo -> prepare("SELECT * FROM marca WHERE codigo = (:codigo)");
        $stmt -> bindParam(':codigo', $codigo, PDO::PARAM_STR);
        $stmt -> execute();
        $linha = $stmt -> fetch(PDO::FETCH_ASSOC);
        return buildMarca($linha['codigo'], $linha['descricao']);
    }
?>