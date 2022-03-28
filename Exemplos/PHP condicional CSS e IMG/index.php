<!DOCTYPE html>
<html lang="pt-br">
<?php
    $titulo = "PHP Imagens com CSS";
    $numero = 0;
    if (isset($_POST["numero"]))
        $numero = $_POST["numero"];    
        $path = "img\\".$numero.".png";
?>
<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo;?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="" method="post">
        <label for="numero">Digite um numero</label>
        <input type="text" name="numero" id="numero"><br>
        <input type="submit">
    </form>
    <?php
        echo "<h1 id=\"h1$numero\"> Numero digitado ".$numero."</h1>";
        echo "<img src=\"$path\" alt=\"\">";
    ?>
</body>
</html>