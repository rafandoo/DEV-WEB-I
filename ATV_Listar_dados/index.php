<!DOCTYPE html>
<?php 
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    include_once "carro.class.php";

    $title = "Lista de Carros";

    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $busca = isset($_POST["busca"]) ? $_POST["busca"] : " ";
    $ordem = isset($_POST["ordem"]) ? $_POST["ordem"] : "nome";

    function anoUsoCarro($dataFabricacao) {
        $anoUso = 0;
        $anoCarro = intval(substr($dataFabricacao, 0, 4));
        $anoAtual = date("Y");
        $anoUso = $anoAtual - $anoCarro;
        return $anoUso;
    }

    function kmPorAno($km, $anoUso) {
        $kmPorAno = 0;
        $kmPorAno = $km / $anoUso;
        return round($kmPorAno, 2);
    }

    function valorRevenda($valor, $km, $anoUso) {
        $valorRevenda = 0;
        if ($anoUso > 10) {
            $valorRevenda = $valor - ($valor * 0.1);
        } else if($km > 100000) {
            $valorRevenda = $valor - ($valor * 0.1);
        } else {
            $valorRevenda = $valor;
        }
        return round($valorRevenda, 2);
    }

    function colorKm($km) {
        if ($km > 100000) {
            return 'red';
        }
    }

    function colorAno($anoUso) {
        if ($anoUso > 10) {
            return 'red';
        }
    }

    function buscaOrdenada($procurar, $busca, $ordem) {
        $pdo = Conexao::getInstance();

        if ($busca == "nome") {
            $stmt = $pdo->prepare("SELECT * FROM carro WHERE $busca LIKE :procurar ORDER BY $ordem");
            $stmt->bindValue(":procurar", "%" . $procurar . "%");
        } else if ($busca == "valor" or $busca == "km") {
            $stmt = $pdo->prepare("SELECT * FROM carro WHERE $busca <= :procurar ORDER BY $ordem");
            $stmt->bindValue(":procurar", $procurar);
        } else {
            $stmt = $pdo->prepare("SELECT * FROM carro ORDER BY $ordem");
        }

        $stmt->execute();

        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $carro = new Carro($linha["id"], $linha["nome"], $linha["valor"], $linha["km"], $linha["dataFabricacao"]);
            echo "<tr>";
            echo "<td>". $carro->getId() ."</td>";
            echo "<td>". $carro->getNome() ."</td>";
            echo "<td>". $carro->getValor(). "</td>";
            echo "<td id=". colorKm($carro->getKm()) .">". $carro->getKm() ."</td>";
            echo "<td id=". colorAno(anoUsoCarro($carro->getDataFabricacao())) .">". $carro->getDataFabricacao() ."</td>";
            echo "<td>". anoUsoCarro($carro->getDataFabricacao()) ."</td>";
            echo "<td>". kmPorAno($carro->getKm(), anoUsoCarro($carro->getDataFabricacao())) ."</td>";
            echo "<td>". valorRevenda($carro->getValor(), $carro->getKm(), anoUsoCarro($carro->getDataFabricacao())) ."</td>";
            echo "<td><a href='javascript:confirmExclusion(\"acaoCarro.php?acao=Excluir&id=". $carro->getId() ."\")'>Excluir</a></td>";
            echo "<td><a href='cadCarro.php?id=". $carro->getId() ."'>Editar</a></td>";
            echo "</tr>";
        }
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/confirm.js"></script>
    <title> <?php echo $title;?> </title>
</head>
<body>
    <?php include 'menu.php';?>
    <form method="post">
    <fieldset>
        <legend>Procurar Carros</legend>
        <input type="text" name="procurar" id="procurar" size="37" value="<?php echo $procurar;?>">
        <input type="submit" name="acao" id="acao">
        <br>
        <span>Busca por: </span>
        <input type="radio" name="busca" id="buscaNome" value="nome">
        <label for="buscaNome">Nome</label>
        <input type="radio" name="busca" id="buscaValor" value="valor">
        <label for="buscaValor">Valor</label>
        <input type="radio" name="busca" id="buscaKm" value="km">
        <label for="buscaKm">Km</label>
        <br><br>
        <span>Ordena por: </span>
        <input type="radio" name="ordem" id="ordemNome" value="nome" checked>
        <label for="ordemNome">Nome</label>
        <input type="radio" name="ordem" id="ordemValor" value="valor">
        <label for="ordemValor">Valor</label>
        <input type="radio" name="ordem" id="ordemKm" value="km">
        <label for="ordemKm">Km</label>
        <br><br>
        <table> 
            <tr>
                <td><b>ID</b></td>
                <td><b>Nome</b></td> 
                <td><b>Valor</b></td>
                <td><b>Km</b></td>
                <td><b>Data de Fabricação</b></td>
                <td><b>Anos de uso do veiculo</b></td>
                <td><b>Média KM/ano</b></td>
                <td><b>Valor de revenda</b></td>
                <td><b>Ação</b></td>
            </tr>
            <?php
                buscaOrdenada($procurar, $busca, $ordem);
            ?>  
        </table>
    </fieldset>
    </form>
</body>
</html>