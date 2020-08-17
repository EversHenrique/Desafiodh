<?php

    require("../Required/pdo.php");

    $id = $_POST['id'];
    $query = $db -> prepare("SELECT nome, descricao, preco, foto FROM produtos WHERE id = :id;");
    $query -> execute([':id' => $id]);
    $produtos = $query -> fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="produto.css">
        <title>Produto</title>
    </head>
    <body>

        <?php require_once('..\Header\header.php'); ?>

        <?php foreach ($produtos as $produto): ?>

        <main class="modal">
            <ul>
                <li>
                    <section class="imagem">
                        <img src="../Img/<?php echo $produto['foto'];?>" alt="Imagem Produto" style="width: 400px; height: 400px;"> 
                    </section>
                </li>
                <li>
                    <section class="produto">
                        <h1  style="border-bottom:none;"><?php echo $produto['nome'];?></h1>
                        <h2  style="border-bottom:none;">Descrição</h2>
                        <p><?php echo $produto['descricao'];?></p>
                        <div class="preco">
                            <h2  style="border-bottom:none;">Preço:</h2>
                            <p>R$:<?php echo $produto['preco'];?></p>
                        </div>                
                    </section>
                </li>
            </ul>
            <div>
                <form  action="../EditarProduto/editarProduto.php" method="POST">
                    <input type="hidden" value="<?= $id; ?>" name="id">
                    <input class="botao-custom" type="submit" value="Editar">
                </form>
                <form action="../Required/deleteProduto.php" method="POST">
                    <input type="hidden" value="<?= $id; ?>" name="id">
                    <input class="botao-custom" type="submit" value="Excluir">
                </form>
            </div>  
        </main>
        <footer>
            <div class="copy">&copy 2020</div>
        </footer>
        <?php endforeach; ?>

    </body>
</html>