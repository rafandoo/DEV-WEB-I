<?php
    $numero = isset($_POST['numero']) ? $_POST['numero'] : 0;
    if ($numero > 999 || $numero < 0) {
        echo "<h2>Número fora do intervalo</h2>";
    } else {
        if ($numero < 10) {
            $unidade = $numero;
            echo "<p>$unidade unidades<p>";
        } else if ($numero < 100) {
            $unidade = substr($numero, 1, 1);
            $dezena = substr($numero, 0, 1);
            echo "<p>$dezena dezenas e $unidade unidades<p>";
        } else {
            $unidade = substr($numero, 2, 1);
            $dezena = substr($numero, 1, 1);
            $centena = substr($numero, 0, 1);
            echo "<p>$centena centenas, $dezena dezenas e $unidade unidades<p>";
        }
    }
?>