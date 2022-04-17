<!DOCTYPE html>
<?php
    $vet = array(10,20,30,40,50,60,70,80,90,100);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        foreach($vet as $item) {
            echo $item."<br>";
        }
    ?>
</body>
</html>