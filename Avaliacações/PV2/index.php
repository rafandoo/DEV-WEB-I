<!DOCTYPE html>
<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    include_once "vendas.class.php";

    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : "";

    function colorTempo($tempo) {
        if ($tempo > 10) {
            return "blueT";
        }
    }

    function colorMes($mes) {
        if ($mes < 5000) {
            return "red";
        } else {
            return "blue";
        }
    }

    function buscar($procurar) {
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM vendas WHERE nome LIKE :procurar ORDER BY nome");
        $stmt->bindValue(":procurar", "%" . $procurar . "%");
        $stmt->execute();

        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $vendas = new Vendas($linha["id"], $linha["nome"], $linha["janeiro"], $linha["fevereiro"], $linha["marco"], $linha["abril"], $linha["maio"], $linha["junho"], $linha["julho"], $linha["agosto"], $linha["setembro"], $linha["outubro"], $linha["novembro"], $linha["dezembro"], $linha["fixo"], $linha["dataContratacao"]);
            echo "<tr>";
            echo "<td>".$vendas->getId()."</td>";
            echo "<td>".$vendas->getNome()."</td>";
            echo "<td id=". colorMes($vendas->getJaneiro()) .">".$vendas->getJaneiro()."</td>";
            echo "<td id=". colorMes($vendas->getFevereiro()) .">".$vendas->getFevereiro()."</td>";
            echo "<td id=". colorMes($vendas->getMarco()) .">".$vendas->getMarco()."</td>";
            echo "<td id=". colorMes($vendas->getAbril()) .">".$vendas->getAbril()."</td>";
            echo "<td id=". colorMes($vendas->getMaio()) .">".$vendas->getMaio()."</td>";
            echo "<td id=". colorMes($vendas->getJunho()) .">".$vendas->getJunho()."</td>";
            echo "<td id=". colorMes($vendas->getJulho()) .">".$vendas->getJulho()."</td>";
            echo "<td id=". colorMes($vendas->getAgosto()) .">".$vendas->getAgosto()."</td>";
            echo "<td id=". colorMes($vendas->getSetembro()) .">".$vendas->getSetembro()."</td>";
            echo "<td id=". colorMes($vendas->getOutubro()) .">".$vendas->getOutubro()."</td>";
            echo "<td id=". colorMes($vendas->getNovembro()) .">".$vendas->getNovembro()."</td>";
            echo "<td id=". colorMes($vendas->getDezembro()) .">".$vendas->getDezembro()."</td>";
            echo "<td>".$vendas->getFixo()."</td>";
            echo "<td>".$vendas->getDataContratacao()."</td>";
            echo "<td id=".colorTempo($vendas->tempoEmpresa()).">".$vendas->tempoEmpresa()."</td>";
            echo "<td>".$vendas->bonusTempo()."</td>";
            echo "<td>".$vendas->comissao()."</td>";
            echo "<td>".$vendas->totalVendas()."</td>";
            echo "<td><a href='javascript:confirmExclusion(\"acao.php?acao=Excluir&id=". $vendas->getId() ."\")'>Excluir</a></td>";
        }
    }
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="js/confirm.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Consulta vendas</title>
</head>
<body>
    <?php include 'menu.php';?>
    <form method="post">
        <fieldset>
            <legend>
                Consulta vendas
            </legend>
            <input type="text" name="procurar" id="procurar" size="37">
            <input type="submit" name="acao" id="acao">
            <br>
            <br>
            <table>
                <tr>
                    <td><b>ID</b></td>
                    <td><b>Nome</b></td>
                    <td><b>Janeiro</b></td>
                    <td><b>Fevereiro</b></td>
                    <td><b>Março</b></td>
                    <td><b>Abril</b></td>
                    <td><b>Maio</b></td>
                    <td><b>Junho</b></td>
                    <td><b>Julho</b></td>
                    <td><b>Agosto</b></td>
                    <td><b>Setembro</b></td>
                    <td><b>Outubro</b></td>
                    <td><b>Novembro</b></td>
                    <td><b>Dezembro</b></td>
                    <td><b>Fixo</b></td>
                    <td><b>Data de contratação</b></td>
                    <td><b>Tempo de empresa</b></td>
                    <td><b>Bonus tempo de empresa</b></td>
                    <td><b>Comissao total</b></td>
                    <td><b>Total de vendas</b></td>
                    <td><b>Ação</b></td>
                </tr>
                <?php
                    buscar($procurar)
                ?>
        </fieldset>
    </form>
    
</body>
</html>