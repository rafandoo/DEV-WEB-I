<!DOCTYPE html>
<html lang="pt=br">
<head>
    <meta charset="UTF-8">
    <title>Carro</title>
</head>
<body>
    <?php include "menu.php";?>
    <form action="acaoCarro.php" method="post">
        <fieldset>
            <legend>Cadastro de Carros</legend>
            <label for ="id">Id:</label>
            <input type="text" name="id" id="id" value="0" readonly>
            <br><br>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" size="37">
            <br><br>
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" size="37">
            <br><br>
            <label for="km">Km:</label>
            <input type="text" name="km" id="km" size="37">
            <br><br>
            <label for="dataFabricacao">Data de Fabricação:</label>
            <input type="text" name="dataFabricacao" id="dataFabricacao" size="37">
            <br><br>
            <input type="submit" name="acao" value="Cadastrar">
        </fieldset>
    </form>    
</body>
</html>