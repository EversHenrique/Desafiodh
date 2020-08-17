<?php
    
    include 'pdo.php';

    $id = $_POST['id'];
    $query = $db -> prepare("DELETE FROM produtos WHERE id = :id;");
    $query -> execute([':id' => $id]);
    
    header("Location: ../Produtos/produtos.php");

?>