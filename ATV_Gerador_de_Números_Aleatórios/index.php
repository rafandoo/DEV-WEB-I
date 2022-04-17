<!DOCTYPE html>
<?php 
    if (isset($_POST['b1'])) {
        header('Location: pag1.php');
    } elseif (isset($_POST['b2'])) {
        header('Location: pag2.php');
    } elseif (isset($_POST['b3'])) {
        header('Location: pag3.php');
    }
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Menu inicial</title>
</head>
<body>
    <form action="" method="post">
        <label for="b1">Gerar valores em um JSON</label><br>
        <input type="submit" value="Entrar" id="b1" name="b1">
        <br><br>
        <label for="b2">Analise valores arquivo JSON</label><br>
        <input type="submit" value="Entrar" id="b2" name="b2">
        <br><br>
        <label for="b3">Gerar grafico de arquivo JSON</label><br>
        <input type="submit" value="Entrar" id="b3" name="b3">
        <br><br>
    </form>
</body>
</html>