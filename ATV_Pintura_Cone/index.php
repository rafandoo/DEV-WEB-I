<!DOCTYPE html>
<?php
    $raio = isset($_POST['raio']) ? $_POST['raio'] : 0;
    $altura = isset($_POST['altura']) ? $_POST['altura'] : 0;
    $tinta = isset($_POST['tinta']) ? $_POST['tinta'] : 0;
    $geratriz = sqrt(pow($raio, 2) + pow($altura, 2));
    $area_lateral = (3.14 * $raio * $geratriz);
    $area_do_circulo = (3.14 * pow($raio, 2));
    $area_total = $area_lateral + $area_do_circulo;
    $litros = $area_total * 3.45;
    $latas = ceil($litros / 18);
    if($tinta == 1){
        $valor_total = $latas * 238.90;
    } else if($tinta == 2){
        $valor_total = $latas * 467.98;
    } else {
        $valor_total = $latas * 758.34;
    }
?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Pintura Cone</title>
    <link rel="stylesheet" href="css\style.css">
</head>
<body>
    <form action="" method="post">
        <label for="raio">Raio</label>
        <br>
        <input type="text" name="raio" id="raio">
        <br><br>
        <label for="altura">Altura</label>
        <br>
        <input type="text" name="altura" id="altura">
        <br><br>
        <label for="tinta">Tinta</label>
        <br>
        <input type="radio" name="tinta" id="t1" value="1">Tipo 1</input>
        <input type="radio" name="tinta" id="t2" value="2">Tipo 2</input>
        <input type="radio" name="tinta" id="t3" value="3">Tipo 3</input>
        <br><br>
        <input type="submit">
    </form>
    <br><br>
    <?php
        echo "<h3 id=\"h3$tinta\">Raio: $raio Altura: $altura Tipo Tinta: $tinta</h3>";
        echo "<h3 id=\"h3$tinta\">Geratriz: $geratriz</h3>";
        echo "<h3 id=\"h3$tinta\">Area do fundo: $area_do_circulo</h3>";
        echo "<h3 id=\"h3$tinta\">Area lateral cone: $area_lateral</h3>";
        echo "<h3 id=\"h3$tinta\">Area total: $area_total</h3>"; 
        echo "<h3 id=\"h3$tinta\">Litros: $litros</h3>";
        echo "<h3 id=\"h3$tinta\">Latas: $latas</h3>";
        echo "<h3 id=\"h3$tinta\">Preço total: $valor_total</h3>";
    ?>
</body>
</html>