<?php
    include_once "conf/default.inc.php";
    include_once "conf/Conexao.php";
    include_once "aluno.class.php";

    $acao = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $acao = $_POST['acao'];
    } else {
        $acao = $_GET['acao'];
    }

    switch ($acao) {
        case 'Cadastrar':
            insertAluno(buildAluno($_POST["id"], $_POST["nome"], $_POST["n1"], $_POST["n2"], $_POST["n3"], $_POST["n4"]));
            break;
        case 'Excluir':
            deleteAluno($_GET["id"]);
            break;
        default:
            break;
    }

    function buildAluno($id, $nome, $n1, $n2, $n3, $n4) {
        $aluno = new Aluno($id, $nome, $n1, $n2, $n3, $n4);
        return $aluno;
    }

    function insertAluno($aluno) {
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("INSERT INTO aluno (nome, n1, n2, n3, n4) VALUES (:nome, :n1, :n2, :n3, :n4)");
        $stmt->bindValue(':nome', $aluno->getNome());
        $stmt->bindValue(':n1', $aluno->getN1());
        $stmt->bindValue(':n2', $aluno->getN2());
        $stmt->bindValue(':n3', $aluno->getN3());
        $stmt->bindValue(':n4', $aluno->getN4());
        $stmt->execute();
        header("Location: index.php");
    }

    function deleteAluno($id) {
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("DELETE FROM aluno WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        header("Location: index.php");
    }
?>