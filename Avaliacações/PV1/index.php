<?php
    function formataMoeda($valor) {
        return ('R$' . number_format($valor, 2, ',', '.'));
    }
    $raio = isset($_POST['raio']) ? $_POST['raio'] : 0;
    $eixo = isset($_POST['eixo']) ? $_POST['eixo'] : 0;
    $seguranca = isset($_POST['seguranca']) ? $_POST['seguranca'] : 0;
    $area =  3.14 * ($raio * $raio);
    $circunferencia = (2 * 3.14 * $raio) * $eixo;
    $areaTotal = (3 * $area) + (2 * $circunferencia);
    $litros = $areaTotal * 4;
    $latas = ceil($litros / 100);
    $path = "img\\".$seguranca.".png";
    if ($seguranca == 1) {
        $valorTotal = formataMoeda($latas * 324.49);
    } else if ($seguranca == 2) {
        $valorTotal = formataMoeda($latas * 479.27);
    } else {
        $valorTotal = formataMoeda($latas * 623.54);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pintura cilindro</title>
    <link rel="stylesheet" href="css\style.css">
</head>
<body>
    <h1>Pintura do cilindro</h1>
    <form action="" method="post">
        <label for="raio">Raio do cilindro</label>
        <br>
        <input type="text" name="raio" id="raio">
        <br><br>
        <label for="eixo">Eixo do cilindro</label>
        <br>
        <input type="text" name="eixo" id="eixo">
        <br><br>
        <input type="radio" name="seguranca" id="baixo" value="1">Baixo</input>
        <input type="radio" name="seguranca" id="medio" value="2">Medio</input>
        <input type="radio" name="seguranca" id="alto" value="3">Alto</input>
        <br><br>
        <input type="submit">
    </form>
    <br>
    <?php
        echo "<h3 id=\"h3$seguranca\">Raio: $raio metros e Eixo: $eixo metros</h3>";
        echo "<h3 id=\"h3$seguranca\">Área Total: $areaTotal metros</h3>";
        echo "<h3 id=\"h3$seguranca\">Serão gastos: $litros litros</h3>";
        echo "<h3 id=\"h3$seguranca\">Você vai utilizar $latas latas</h3>";
        echo "<h3 id=\"h3$seguranca\">Você vai gastar: $valorTotal</h3>";
        echo "<img src=\"$path\" alt=\"\">";
    ?>
</body>
</html>                     