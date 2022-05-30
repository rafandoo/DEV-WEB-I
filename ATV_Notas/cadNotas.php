<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Notas Aluno</title>
</head>
<body>
    <?php include 'menu.php';?>
    <form action="acaoNotas.php" method="post">
        <fieldset>
            <legend>Cadastro de notas</legend>
            <label for="id">ID</label>
            <input type="text" name="id" id="id" value="0" onlyread>
            <br><br>
            <label for="nome">Aluno</label>
            <input type="text" name="nome" id="nome">
            <br><br>
            <label for="n1">Nota 1</label>
            <input type="text" name="n1" id="n1">
            <br><br>
            <label for="n2">Nota 2</label>
            <input type="text" name="n2" id="n2">
            <br><br>
            <label for="n3">Nota 3</label>
            <input type="text" name="n3" id="n3">
            <br><br>
            <label for="n4">Nota 4</label>
            <input type="text" name="n4" id="n4">
            <br><br>
            <input type="submit" name="acao" value="Cadastrar">
        </fieldset>
    </form>
</body>
</html>