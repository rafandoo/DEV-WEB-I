<!DOCTYPE html>
<?PHP
    $times = array("Palmeiras",  "São Paulo", "Santos");
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Times de futebol</title>
</head>
<body>
    <select>
        <?php
            for ($i = 0; $i < count($times); $i++) {
                echo '<option value="'.$times[$i].'">'.$times[$i].'</option>';
            }
        ?>
    </select>
</body>
</html>