<?php
    require_once "conf/Conexao.php";
    include_once "conf/default.inc.php";
    include_once "marca.class.php";

    $acao = "";
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET' : $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
        case 'POST' : $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
    }

    if ($acao == 'excluir') {
        deleteMarca(marcaCriar($_GET['codigo'], $_GET['descricao']));
    }

    function marcaCriar($codigo, $descricao){
        return $marca = new marca($codigo, $descricao);
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
?>