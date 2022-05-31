<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Vendas</title>
</head>
<body>
    <?php include 'menu.php';?>
    <form action="acao.php" method="post">
        <fieldset>
            <legend>Cadastro de vendas</legend>
            <label for="id">ID</label>
            <input type="text" name="id" id="id" value="0" onlyread>
            <br><br>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
            <br><br>
            <label for="janeiro">Janeiro</label>
            <input type="text" name="janeiro" id="janeiro">
            <br><br>
            <label for="fevereiro">Fevereiro</label>
            <input type="text" name="fevereiro" id="fevereiro">
            <br><br>
            <label for="marco">marco</label>
            <input type="text" name="marco" id="marco">
            <br><br>
            <label for="abril">abril</label>
            <input type="text" name="abril" id="abril">
            <br><br>
            <label for="maio">maio</label>
            <input type="text" name="maio" id="maio">
            <br><br>
            <label for="junho">junho</label>
            <input type="text" name="junho" id="junho">
            <br><br>
            <label for="julho">julho</label>
            <input type="text" name="julho" id="julho">
            <br><br>
            <label for="agosto">agosto</label>
            <input type="text" name="agosto" id="agosto">
            <br><br>
            <label for="setembro">setembro</label>
            <input type="text" name="setembro" id="setembro">
            <br><br>
            <label for="outubro">outubro</label>
            <input type="text" name="outubro" id="outubro">
            <br><br>
            <label for="novembro">novembro</label>
            <input type="text" name="novembro" id="novembro">
            <br><br>
            <label for="dezembro">dezembro</label>
            <input type="text" name="dezembro" id="dezembro">
            <br><br>
            <label for="fixo">fixo</label>
            <input type="text" name="fixo" id="fixo">
            <br><br>
            <label for="dataContratacao">Data de Contratacao</label>
            <input type="text" name="dataContratacao" id="dataContratacao">
            <br><br>
            <input type="submit" name="acao" value="Cadastrar">
        </fieldset>
    </form>
</body>
</html>