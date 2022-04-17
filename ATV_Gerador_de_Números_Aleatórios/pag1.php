<!DOCTYPE html>
<?php
    $valores = isset($_POST['valores']) ? $_POST['valores'] : 0;
    $inicio = isset($_POST['inicio']) ? $_POST['inicio'] : 0;
    $fim = isset($_POST['fim']) ? $_POST['fim'] : 0;
    $arquivo = isset($_POST['arquivo']) ? $_POST['arquivo'].".json" : "";

    # gera numeros aleatorios dentro de um range e retona uma lista
    function gerarArray() {
        $valoresGerados = array();
        for ($x = 0; $x < $GLOBALS['valores']; $x++) {
            $valoresGerados[$x] = rand($GLOBALS['inicio'], $GLOBALS['fim']);
        }
        return $valoresGerados;
    }
    
    # cria o arquivo JSON a partir de uma lista
    function gerarJson($lista, $arquivo) {
        try {
            $dados_json = json_encode($lista);
            $fp = fopen("$arquivo", "w");
            fwrite($fp, $dados_json);
            fclose($fp);
            return 'Arquivo gerado com sucesso!';
        } catch (Exception $e) {
            return ('Exceção: '.$e -> getMessage());
        }
    }
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerar arquivo JSON</title>
</head>
<body>
    <form action="pag1.php" method="post">
        <label for="valores">Digite a quantidade de valores a ser gerado</label><br>
        <input type="number" name="valores" id="valores">
        <br><br>
        <label for="inicio">Digite o inicio</label><br>
        <input type="number" name="inicio" id="inicio">
        <br><br>
        <label for="fim">Digite o fim</label><br>
        <input type="number" name="fim" id="fim">
        <br><br>
        <label for="arquivo">Nome do arquivo</label><br>
        <input type="text" name="arquivo" id="arquivo">
        <span>.json</span>
        <br><br>
        <input type="submit" name="enviar">
        <input type="submit" name="voltar" value="Voltar">
    </form>
    <?php
        if (isset($_POST['enviar'])) {
            echo "<h3>" . gerarJson(gerarArray(), $arquivo) . "</h3>";
        } elseif (isset($_POST['voltar'])) {
            header('Location: index.php');
        }
    ?>
</body>
</html>