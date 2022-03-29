<?php
    $altura = isset($_POST['altura']) ? $_POST['altura'] : 0;
    $peso = isset($_POST['peso']) ? $_POST['peso'] : 0;
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : "";
    if ($sexo == "feminino") {
        $peso_ideal = round(((62.1 * $altura) - 44.7), 2);
    } else {
        $peso_ideal = round(((72.7 * $altura) - 58), 2);
    }
    echo "<h2>Dados informados: </h2>";
    echo "<h2>Altura: $altura</h2>";
    echo "<h2>Peso: $peso</h2>";
    echo "<h2>Sexo: $sexo</h2> <br>";
    echo "<h2>Seu peso ideal é de $peso_ideal</h2>";
    if ($peso < $peso_ideal)   
        echo "<h2>Você esta abaixo do peso</h2>";
    else if ($peso > $peso_ideal)
        echo "<h2>Você esta acima do peso</h2>";
    else
        echo "<h2>Você esta no peso ideal</h2>";
?>