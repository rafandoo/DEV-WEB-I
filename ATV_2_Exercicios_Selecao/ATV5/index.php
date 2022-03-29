<!DOCTYPE html>
<html lang="pt-br">
<?php
    $title = "Verifica se é vogal";
    $msg = "";
    $char = strtoupper(isset($_POST['letra']) ? $_POST['letra'] : "");
    if ($char == "A" || $char == "E" || $char == "I" || $char == "O" || $char == "U")
        $msg = "A letra digitada é uma vogal";
    else if ($char != "")
        $msg = "A letra digitada não é uma vogal";
?>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
</head>
<body>
    <h1><?php echo $title;?></h1>
    <form action="" method="post">
        <label for="letra">Digite uma letra</label>
        <br>
        <input type="text" name="letra" id="letra" maxlength="1">
        <input type="submit">
    </form>
    <h2><?php echo $msg;?></h2>
</body>
</html>