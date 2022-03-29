<?php
    $salario = isset($_POST['salario']) ? $_POST['salario'] : 0;
    echo "<h2>Informações calculadas: </h2>
          <h2>Salario anterior: R$ ".round($salario, 2)."</h2>";
    if ($salario <= 280.00) {
        $reajuste = round(($salario * (0.20)), 2);
        echo "<h2>Percentual de reajuste aplicado: 20%</h2>
              <h2>Valor do aumento: ".$reajuste."</h2>
              <h2>Salario novo: R$ ".round(($salario + $reajuste), 2)."</h2>";
    } else if ($salario > 280.00 && $salario < 700.00) {
        $reajuste = round(($salario * (0.15)), 2);
        echo "<h2>Percentual de reajuste aplicado: 15%</h2>
              <h2>Valor do aumento: ".$reajuste."</h2>
              <h2>Salario novo: R$ ".round(($salario + $reajuste), 2)."</h2>";
    } else if ($salario > 700.00 && $salario < 1500.00) {
        $reajuste = round(($salario * (0.10)), 2);
        echo "<h2>Percentual de reajuste aplicado: 10%</h2>
              <h2>Valor do aumento: ".$reajuste."</h2>
              <h2>Salario novo: R$ ".round(($salario + $reajuste), 2)."</h2>";
    } else {
        $reajuste = round(($salario * (0.05)), 2);
        echo "<h2>Percentual de reajuste aplicado: 5%</h2>
              <h2>Valor do aumento: ".$reajuste."</h2>
              <h2>Salario novo: R$ ".round(($salario + $reajuste), 2)."</h2>";
    }
?>