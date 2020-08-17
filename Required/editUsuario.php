<?php

require_once "pdo.php";

function verificarNome($nomePost) {
    if(strlen($nomePost) == 0) {
        return false;
    } else {
        return true;
    }
}

function verificaEmail($emailPost) {
    if(strlen($emailPost) == 0) {
        return false; 
    } else {
        return true;
    }
}

function verificaSenha($senhaPost) {
    if(strlen($senhaPost) < 6) {
        return false;
    } else {
        return true;
    }
}

function comparaSenha($senhaPost, $senhaConfirmadaPost) {
    if($senhaPost != $senhaConfirmadaPost) {
        return false;
    } else {
        return true;
    }
}

$nomePost = true;
$emailPost = true;
$senhaPost = true;
$senhaConfirmadaPost = true;

if ($_POST) {

    $id = $_POST['id'];
    $nome = $_POST['nomeUsuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senhaConfirmada = $_POST['confirmaSenha'];

    $nomePost = verificarNome($nome);
    $emailPost = verificaEmail($email);
    $senhaPost = verificaSenha($senha);
    $senhaConfirmadaPost = comparaSenha($senha, $senhaConfirmada);
    
    if ($nomePost && $emailPost && $senhaPost && $senhaConfirmadaPost) {
        $query = $db -> prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id;");
        $editado = $query -> execute([':id' => $id, ':nome' => $nome, ':email' => $email, ':senha' => password_hash($senha, PASSWORD_DEFAULT)]);
        header("location: ../CreateUsuario/createUsuario.php");
    } else {
        header("Location: ../EditarUsuario/editarUsuario.php");
    }
}

?>