<!DOCTYPE html>
<?php 
   include_once "conf/default.inc.php";
   require_once "conf/Conexao.php";
   include_once "marca.class.php";
   $title = "Lista de Marcas";
   $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 

?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
</head>
<body>
    <form method="post">
    <fieldset>
        <legend>Procurar Marcas</legend>
        <input type="text"   name="procurar" id="procurar" size="37" value="<?php echo $procurar;?>">
        <input type="submit" name="acao"     id="acao">
        <br><br>
        <table>
	    <tr><td><b>Código</b></td><td><b>Descrição</b></td> </tr>
        <?php
            $pdo = Conexao::getInstance(); 
            $consulta = $pdo->query("SELECT * FROM marca 
                                     WHERE descricao LIKE '$procurar%' 
                                     ORDER BY descricao");
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
                $marca = new Marca($linha['codigo'],$linha['descricao']);
        ?>
	    <tr><td><?php echo $marca->getCodigo();?></td>
            <td><?php echo $marca->getDescricao();?></td>
	    </tr>
            <?php } ?>       
        </table>
    </fieldset>
    </form>
</body>
</html>
