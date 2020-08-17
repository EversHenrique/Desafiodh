<?php

require_once "pdo.php";

function verificarNome($nome) {
    if(strlen($nome) == 0) {
        return false;
    } else {
        return true;
    }
}

function verificarPreco($preco) {
    if(is_numeric($preco)){
        return true;
    } else {
        return false;
    }
}

function verificaImagem($foto) {
    $extensoesValidas = ['image/jpg','image/png','image/jpeg'];
    if ($_FILES['foto']['error'] == 0){
    if (array_search($_FILES['foto']['type'], $extensoesValidas) === false){
        echo "Extensão do arquivo inválida!";
        exit;
    }
    if (move_uploaded_file($_FILES['foto']['tmp_name'], '../Img/'.$_FILES['foto']['name'])){
        echo "Arquivo salvo com sucesso";
        return true;
    } else {
        echo "Erro na hora de salvar o seu arquivo";
    }
    } else {
        echo "Erro no envio do arquivo";
    }
}

$nomePost = true;
$precoPost = true;

if ($_POST) {

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $foto = $_FILES['foto']['name'];

    $nomePost = verificarNome($nome);
    $precoPost = verificarPreco($preco);
    $imagemFile = verificaImagem($foto);
    
    if ($nomePost && $precoPost && $imagemFile) {
        $query = $db -> prepare("INSERT INTO produtos (nome, descricao, preco, foto) VALUES (:nome, :descricao, :preco, :foto);");
        $query -> execute([':nome' => $nome, 'descricao' => $descricao, ':preco' => $preco, ':foto' => $foto]);
        header("Location: ../Produtos/produtos.php");
    } else {
        header("Location: ../CreateProduto/createProduto.php");
    }
}

?>