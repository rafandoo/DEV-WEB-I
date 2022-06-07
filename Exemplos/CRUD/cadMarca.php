<!DOCTYPE html>
<?php
    include_once "marca.class.php";
    include_once "acaoMarca.php";

    $title = "Cadastro de Marcas";

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";

    $value = "salvar";
    $codigo = "0";
    $descricao = "";

    if ($acao == "alterar") {
        $value = "editar";
        $marca = getMarca($_GET["codigo"]);
        $codigo = $marca->getCodigo();
        $descricao = $marca->getDescricao();
    }
    
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title?></title>
</head>
<body>
    <form action="acaoMarca.php" method="post">
        <fieldset>
            <legend><?php echo $title?></legend>
            <label for="cod">Codigo</label>
            <input type="text" name="codigo" id="codigo" readonly value="<?php echo $codigo;?>">
            <br><br>
            <label for="descricao">Descricao</label>
            <input type="text" name="descricao" id="descricao" value="<?php echo $descricao;?>">
            <br><br>
            <input type="submit" value="<?php echo $value;?>" name="acao">
            <a href="index.php">voltar</a>
        </fieldset>
    </form>
</body>
</html>