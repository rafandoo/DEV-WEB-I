<!DOCTYPE html>
<?php
    include_once "marca.class.php";
    include_once "acaoMarca.php";

    if (isset($_POST["salvar"])) {
        $marca = new Marca(0, $_POST['descricao']);
        insertMarca($marca);
    }
    
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Marca</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>Cadastro de Marca</legend>
            <label for="cod">Codigo</label>
            <input type="text" name="cod" id="cod">
            <br>
            <label for="descricao">Descricao</label>
            <input type="text" name="descricao" id="descricao">
            <br>
            <input type="submit" value="Salvar" name="salvar">
            <a href="index.php">Voltar</a>
        </fieldset>
    </form>
</body>
</html>