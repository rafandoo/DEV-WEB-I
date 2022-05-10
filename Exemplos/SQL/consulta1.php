<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=test', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $consulta = $pdo->query('select * from marca;');

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "Codigo: {$linha['codigo']} - Descriçao: {$linha['descricao']} <br/>";
    }
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>