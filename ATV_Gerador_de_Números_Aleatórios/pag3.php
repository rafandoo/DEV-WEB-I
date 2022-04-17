<!DOCTYPE html>
<?php
    $arquivo = isset($_POST['arquivo']) ? $_POST['arquivo'] . ".json" : "";
    
    # abre o arquivo JSON em um array
    function abrirJson($arquivo) {
        try {
            $dadosJson = file_get_contents($arquivo);
            $lista = json_decode($dadosJson);
            return $lista;
        } catch (Exception $e) {
            echo 'Exceção: ', $e->getMessage();
        }
    }

    # gera a string contendo os elementos do grafico
    function gerarDados($lista) {
        $dados = "";
        $i = 1;
        foreach ($lista as $value) {
            $dados .= "[$i, $value], ";
            $i++;
        }
        return substr($dados, 0, -2);
    }

    # plota o grafico de linha simples
    function desenharGrafico() {
        echo '<script type="text/javascript">
                google.charts.load(\'current\', {packages: ["corechart", "line"]});
                google.charts.setOnLoadCallback(graficoSimples);
  
                function graficoSimples() {
                    var data = new google.visualization.DataTable();
                    data.addColumn("number", "X");
                    data.addColumn("number", "Número");
                    data.addRows([' . gerarDados(abrirJson($GLOBALS['arquivo'])) . ']);
                    
                    var grafico = new google.visualization.LineChart(document.getElementById("grafico"));

                    grafico.draw(data);
                }
            </script>';
    }
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Grafico de arquivo JSON</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
        if (isset($_POST['enviar'])) {
            desenharGrafico();
        } elseif (isset($_POST['voltar'])) {
            header('Location: index.php');
        }
    ?>
</head>
<body>
    <form action="pag3.php" method="post">
        <label for="arquivo">Nome do arquivo</label><br>
        <input type="text" name="arquivo" id="arquivo">
        <span>.json</span>
        <br><br>
        <input type="submit" name="enviar">
        <input type="submit" name="voltar" value="Voltar">
    </form>
    <div id="grafico" style="width: 600px; height: 300px"></div>
</body>
</html>