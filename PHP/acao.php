<?php
        $user = isset($_POST['user']) ? $_POST['user'] : "";
        $pass = isset($_POST['pass']) ? $_POST['pass'] : "";

        if ($pass == $user)
            echo "<h1>ERROR: o usuario e senha não podem ser iguais!</h1>";
        else
            echo "<h1>OK! logado com sucesso</h1>";
?>