<?php

    session_start();

    require("../Required/pdo.php");

    $query = $db -> prepare("SELECT id, nome, descricao, preco FROM produtos;");
    $query -> execute();
    $produtos = $query -> fetchAll(PDO::FETCH_ASSOC);
    
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="produtos.css">
        <title>Produtos</title>
    </head>
    <body>
        
        <?php require_once('..\Header\header.php'); ?>

        <main class="modal">
            <h1>Produtos cadastrados</h1>
            <table>
                <thead>
                    <tr>
                        <th class="th-name">Nome</th>
                        <th class="th-descricao">Descrição</th>
                        <th class="th-preco">Preço</th>
                        <th class="th-editar">Editar</th>
                        <th>Visitar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td>
                                <form action="../Produto/produto.php" method="POST">
                                    <input type="hidden" value="<?= $produto['id']; ?>" name="id">
                                    <input type="submit" value="<?php echo $produto['nome']?>">
                                </form>
                            </td>
                            <td>
                                <?php echo $produto['descricao']?>
                            </td>
                            <td class="table-center">
                                <?php echo '$'.$produto['preco']?>
                            </td>
                            <td class="table-center">
                                <form action="../Editarproduto/editarProduto.php" method="POST">
                                    <input type="hidden" value="<?= $produto['id']; ?>" name="id">
                                    <input type="submit" value="Editar">
                                </form>
                            </td>
                            <td>
                                <form action="../Produto/produto.php" method="POST">
                                    <input type="hidden" value="<?= $produto['id']; ?>" name="id">
                                    <input type="submit" value="Visitar">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="botao">
                <a href="../CreateProduto/createProduto.php"><button class="botao-custom">Cadastrar produtos!</button></a>
            </div>
        </main>
        <footer style="margin-top: 10%;">
            <div class="copy">&copy 2020</div>
        </footer>
    </body>
</html>

