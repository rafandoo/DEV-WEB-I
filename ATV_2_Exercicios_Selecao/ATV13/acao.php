<?php
    function formataMoeda($valor) {
        return ('R$' . number_format($valor, 2, ',', '.'));
    }

    $valorHora = isset($_POST['vHora']) ? $_POST['vHora'] : 0;
    $horasTrabalhadas = isset($_POST['horasT']) ? $_POST['horasT'] : 0;
    $salarioBruto = $valorHora * $horasTrabalhadas;

    if ($salarioBruto <= 900.00) {
        $aliquotaIR = 0;
        $ir = $salarioBruto * ($aliquotaIR / 100);
    } else if ($salarioBruto <= 1500.00) {
        $aliquotaIR = 5;
        $ir = $salarioBruto * ($aliquotaIR / 100);
    } else if ($salarioBruto <= 2500.00) {
        $aliquotaIR = 10;
        $ir = $salarioBruto * ($aliquotaIR / 100);
    } else if ($salarioBruto > 2500.00) {
        $aliquotaIR = 20;
        $ir = $salarioBruto * ($aliquotaIR / 100);
    }

    $inss = $salarioBruto * 0.10;
    $sindicato = $salarioBruto * 0.03;
    $fgts = $salarioBruto * 0.11;

    echo "<h1>Folha de pagamento</h1>
          <p>Salário Bruto: ".formataMoeda($salarioBruto)."<p>
          <p>(-) IR($aliquotaIR%): ".formataMoeda($ir)."</p>
          <p>(-) INSS(10%): ".formataMoeda($inss)."</p>
          <p>(-) SINDICATO(3%): ".formataMoeda($sindicato)."</p>
          <p>FGTS(11%): ".formataMoeda($fgts)."</p>
          <p>Total de descontos: ".formataMoeda(($ir + $inss + $sindicato))."</p>
          <p>Salário Liquido: ".formataMoeda(($salarioBruto - ($ir + $inss + $sindicato)))."</p>
          ";
?>