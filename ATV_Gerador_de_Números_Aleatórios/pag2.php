<!DOCTYPE html>
<?php
    $arquivo = isset($_POST['arquivo']) ? $_POST['arquivo'] . ".json" : "";
    $idResultado = isset($_POST['resultado']) ? $_POST['resultado'] : 1;

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

    function resultados($lista, $idResultado) {
        switch ($idResultado) {
            # ordem normal
            case 1:
                $msg = "";
                foreach ($lista as $value) {
                    $msg .= $value . "<br>";
                }
                return $msg;
                break;

            # ordem inversa
            case 2:
                $msg = "";
                $listaInverso = array_reverse($lista);
                foreach ($listaInverso as $value) {
                    $msg .= $value . "<br>";
                }
                return $msg;
                break;

            # valor maximo
            case 3:
                return max($lista);
                break;

            # valor minimo
            case 4:
                return min($lista);
                break;

            # valores pares
            case 5:
                $msg = "";
                foreach ($lista as $value) {
                    if ($value % 2 == 0) {
                        $msg .= $value . "<br>";
                    }
                }
                return $msg;
                break;

            # valores impares
            case 6:
                $msg = "";
                foreach ($lista as $value) {
                    if ($value % 2 != 0) {
                        $msg .= $value . "<br>";
                    }
                }
                return $msg;
                break;

            # soma dos elementos
            case 7:
                return array_sum($lista);
                break;

            # media dos elementos
            case 8:
                return (array_sum($lista) / count($lista));
                break;

            # elementos acima da media
            case 9:
                $msg = "";
                $media = array_sum($lista) / count($lista);
                foreach ($lista as $value) {
                    if ($value > $media) {
                        $msg .= $value . "<br>";
                    }
                }
                return $msg;
                break;

            # elementos abaixo da media 
            case 10:
                $msg = "";
                $media = array_sum($lista) / count($lista);
                foreach ($lista as $value) {
                    if ($value < $media) {
                        $msg .= $value . "<br>";
                    }
                }
                return $msg;
                break;
            
            # numeros primos
            case 11:
                $msg = "";
                foreach ($lista as $value) {
                    if (testarPrimo($value) == true) {
                        $msg .= $value . "<br>";
                    }
                }
                return $msg;
                break;

            # mediana
            case 12:
                $len = count($lista);
                if ($len % 2) {
                    $mediana = $lista[(($len + 1) / 2) - 1];
                } else {
                    $m1 = $lista[($len / 2) - 1];
                    $m2 = $lista[($len / 2)];
                    $mediana = ($m1 + $m2) / 2;
                }
                return $mediana;
                break;
        }
    }

    # função para testar se um numero é ou não primo
    function testarPrimo($numero) {
        for ($i = 2; $i < $numero-1; $i++){ 
            if ($numero % $i == 0) 
                return false; 
        } 
        return true; 
    }
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Analise de arquivo JSON</title>
</head>

<body>
    <form action="pag2.php" method="post">
        <label for="arquivo">Nome do arquivo</label><br>
        <input type="text" name="arquivo" id="arquivo" value=<?php echo substr($arquivo, 0, -5);?>>
        <span>.json</span>
        <br><br>
        <input type="radio" name="resultado" id="resultado" value="1" checked="true">Elementos ordenados na ordem original
        <br>
        <input type="radio" name="resultado" id="resultado" value="2">Elementos na ordem inversa
        <br>
        <input type="radio" name="resultado" id="resultado" value="3">Maior elemento
        <br>
        <input type="radio" name="resultado" id="resultado" value="4">Menor elemento
        <br>
        <input type="radio" name="resultado" id="resultado" value="5">Elementos pares
        <br>
        <input type="radio" name="resultado" id="resultado" value="6">Elementos ímpares
        <br>
        <input type="radio" name="resultado" id="resultado" value="7">Soma dos elementos
        <br>
        <input type="radio" name="resultado" id="resultado" value="8">Média dos elementos
        <br>
        <input type="radio" name="resultado" id="resultado" value="9">Elementos acima da media
        <br>
        <input type="radio" name="resultado" id="resultado" value="10">Elementos abaixo da media
        <br>
        <input type="radio" name="resultado" id="resultado" value="11">Elementos primos
        <br>
        <input type="radio" name="resultado" id="resultado" value="12">Mediana
        <br><br>
        <input type="submit" name="enviar">
        <input type="submit" name="voltar" value="Voltar">
    </form>
    <?php
        if (isset($_POST['enviar'])) {
            echo "<br> <h3>Resultado:</h3>";
            echo resultados(abrirJson($arquivo), $idResultado);
        } elseif (isset($_POST['voltar'])) {
            header('Location: index.php');
        }
    ?>
</body>
</html>