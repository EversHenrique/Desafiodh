<?php
    
    include 'pdo.php';

    $id = $_POST['id'];
    $query = $db -> prepare("DELETE FROM usuarios WHERE id = :id;");
    $query -> execute([':id' => $id]);
    
    header("Location: ../CreateUsuario/createUsuario.php");

?>

