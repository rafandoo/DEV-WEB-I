<?php
    require_once "conf/Conexao.php";
    include_once "conf/default.inc.php";
    include_once "marca.class.php";

    function insertMarca($marca) {
        $pdo = Conexao::getInstance();
        $stmt = $pdo -> prepare("INSERT INTO marca (descricao) VALUES (:descricao)");
        $stmt -> bindParam(':descricao', $marca->getDescricao(), PDO::PARAM_STR);
        $stmt -> execute();
        header("location:index.php");
    }

?>