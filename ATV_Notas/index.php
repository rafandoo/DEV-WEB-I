<!DOCTYPE html>

<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    include_once "aluno.class.php";

    $procurar = isset($_POST['procurar']) ? $_POST['procurar'] : '';

    function corNota($nota) {
        if ($nota < 6) {
            return "red";
        } else {
            return "blue";
        }
    }

    function corSituacao($situacao) {
        if ($situacao == "Reprovado") {
            return "red";
        } else {
            return "blue";
        }
    }

    function buscar($procurar) {
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM aluno WHERE nome LIKE :procurar ORDER BY nome");
        $stmt->bindValue(":procurar", "%" . $procurar . "%");
        $stmt->execute();
        
        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $aluno = new Aluno($linha['id'], $linha['nome'], $linha['n1'], $linha['n2'], $linha['n3'], $linha['n4']);
            echo "<tr>";
            echo "<td>".$aluno->getId()."</td>";
            echo "<td>".$aluno->getNome()."</td>";
            echo "<td id=". corNota($aluno->getN1()) .">".$aluno->getN1()."</td>";
            echo "<td id=". corNota($aluno->getN2()) .">".$aluno->getN2()."</td>";
            echo "<td id=". corNota($aluno->getN3()) .">".$aluno->getN3()."</td>";
            echo "<td id=". corNota($aluno->getN4()) .">".$aluno->getN4()."</td>";
            echo "<td id=". corNota($aluno->getMedia()) .">".$aluno->getMedia()."</td>";
            echo "<td id=". corSituacao($aluno->getSituacao()) .">".$aluno->getSituacao()."</td>";
            echo "<td><a href='javascript:confirmExclusion(\"acaoNotas.php?acao=Excluir&id=". $aluno->getId() ."\")'>Excluir</a></td>";
        }
    }

    $title = "Cadastro de Notas";

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
    <script src="js/confirm.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'menu.php';?>
    <form method="post">
        <fieldset>
            <legend>Listar notas</legend>
            <input type="text" name="procurar" id="procurar" size="37">
            <input type="submit" name="acao" id="acao">
            <br>
            <br>
            <table>
                <tr>
                    <td><b>ID</b></td>
                    <td><b>Aluno</b></td>
                    <td><b>Nota 1</b></td>
                    <td><b>Nota 2</b></td>
                    <td><b>Nota 3</b></td>
                    <td><b>Nota 4</b></td>
                    <td><b>Média</b></td>
                    <td><b>Situação</b></td>
                    <td><b>Ação</b></td>
                </tr>
                <?php
                    buscar($procurar)
                ?>
            </table>
        </fieldset>
    </form>
</body>
</html>