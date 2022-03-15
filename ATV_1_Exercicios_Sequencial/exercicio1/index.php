<?php
    $num1 = isset($_GET['num1']) : $_GET['num1'] : "";
    $num2 = isset($_GET['num2']) : $_GET['num2'] : "";

    if ($pass == $user)
    echo "<h1>ERROR: o usuario e senha não podem ser iguais!</h1>";
    else
    echo "<h1>OK! logado com sucesso</h1>";

?>
