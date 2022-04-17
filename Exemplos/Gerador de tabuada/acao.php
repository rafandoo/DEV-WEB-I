<?PHP
    $numero = isset($_POST['numero']) ? $_POST['numero'] : 0;
    $inicio = isset($_POST['inicio']) ? $_POST['inicio'] : 0;
    $fim = isset($_POST['fim']) ? $_POST['fim'] : 0;
    $ordem = isset($_POST['ordem']) ? $_POST['ordem'] : 0;

    #var_dump($_POST);

    if ($ordem == 1) {
        for($x = $inicio; $x <= $fim; $x++){
            $mult = $numero * $x;
            echo "<h3>$numero x $x = $mult</h3>";
        }
    } else {
        for($x = $inicio; $x >= $fim; $x--){
            $mult = $numero * $x;
            echo "<h3>$numero x $x = $mult</h3>";
        }
    }
?> 
