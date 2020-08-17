<?php

    session_start();

    require ("../Required/pdo.php");

    $query = $db -> prepare("SELECT email, senha FROM usuarios;");
    $query -> execute();
    $login = $query -> fetchAll(PDO::FETCH_ASSOC);

    var_dump($_POST);

    if ($_POST) {
        foreach ($login as $entrar) {
            if ($_POST['email'] == $entrar['email'] && password_verify($_POST['password'], $entrar['senha'])) {
                header("Location: ../Produtos/produtos.php");
            } else {
                header("Location: ../Login/login.php");
            }
        }
    } else {
        echo "erro";
    }
?>