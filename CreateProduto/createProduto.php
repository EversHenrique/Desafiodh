<?php

    require("../Required/insertProduto.php");

?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="createProduto.css">
        <title>Cadastro - Produto</title>
    </head>
    <body>
    
        <?php include('..\Header\header.php'); ?>

        <main class="modal">
            <form method="POST" enctype="multipart/form-data">
                <div class="titulo">
                    <h1>Cadastrar Produto</h1><br>
                </div>
                <div class="input"> 
                    <label for="nome">Nome</label><br>
                    <input class="input-custom" type="text" name="nome" id="nome" required><br>
                </div>
                <div class="input">
                    <label for="preco">Preço</label><br>
                    <input class="input-custom" type="text" name="preco" id="preco" required><br>
                </div>
                <div class="input">
                    <label for="descricao">Descrição</label><br>
                    <textarea class="descricao-custom" name="descricao" id="descricao" rows="6" cols="65"></textarea><br>
                </div>
                <div class="imagem">
                    <label for="foto">Imagem do produto</label>
                    <input class="foto-personalizada" type="file" name="foto" id="foto" required><br>
                </div>
                <div class="botao">
                    <form action="../Required/insertProduto.php" id="foto" enctype="multipart/form-data">
                        <button class="botao-custom" type="submit" id="foto">Enviar</button>
                    </form>
                </div>
            </form> 

            <a href="../Produtos/produtos.php" class="voltar">Voltar para produtos</a> 

        </main>
        <footer>
            <div class="copy">&copy 2020</div>
        </footer>
    </body>
</html>
