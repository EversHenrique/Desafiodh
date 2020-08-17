<?php

require_once "pdo.php";

function verificarNome($nomeEnviado) {
    if(strlen($nomeEnviado) == 0) {
        return false;
    } else {
        return true;
    }
}

function verificaEmail($emailEnviado) {
    if(strlen($emailEnviado) == 0) {
        return false; 
    } else {
        return true;
    }
}

function verificaSenha($senhaEnviado) {
    if(strlen($senhaEnviado) < 6) {
        return false;
    } else {
        return true;
    }
}

function comparaSenha($senhaEnviado, $senhaConfirmadaEnviada) {
    if($senhaEnviado != $senhaConfirmadaEnviada) {
        return false;
    } else {
        return true;
    }
}

$nomeEnviado = true;
$emailEnviado = true;
$senhaEnviado = true;
$senhaConfirmadaEnviada = true;

if ($_POST) {

    $nome = $_POST['nomeUsuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senhaConfirmada = $_POST['confirmaSenha'];
    
    $nomeEnviado = verificarNome($nome);
    $emailEnviado = verificaEmail($email);
    $senhaEnviado = verificaSenha($senha);
    $senhaConfirmadaEnviada = comparaSenha($senha, $senhaConfirmada);
    
    if ($nomeEnviado && $emailEnviado && $senhaEnviado && $senhaConfirmadaEnviada) {
        $query = $db -> prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha);");
        $cadastrado = $query -> execute([':nome' => $nome, ':email' => $email, ':senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT)]);
    } else {
        $cadastrado = false;
    }
     
    if ($cadastrado) {
        header("Location: ../CreateUsuario/createUsuario.php");
    }
}

?>
