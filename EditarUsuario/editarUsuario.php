<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="editarUsuario.css">
        <title>Editar - Usuário</title>
    </head>
    <body>
    
        <?php require_once('..\Header\header.php'); ?>

        <main class="modal">
            <form action="../Required/editUsuario.php" method="POST">
                <div class="titulo">
                    <h1>Editar usuário</h1><br>
                </div>
                <div class="input"> 
                    <label for="nomeUsuario">Novo nome</label><br>
                    <input class="input-custom" type="text" name="nomeUsuario" id="nomeUsuario" required><br>
                </div>
                <div class="input">
                    <label for="email">Novo e-mail</label><br>
                    <input class="input-custom" type="email" name="email" id="email" required><br>
                </div>
                <div class="input">
                    <label for="senha">Nova senha</label><br>
                    <input class="input-custom" type="password" name="senha" id="senha" required><br>
                </div>
                <div class="input">
                    <label for="confirmaSenha">Confirma a senha</label><br>
                    <input class="input-custom" type="password" name="confirmaSenha" id="confirmaSenha" required><br>
                </div>

                <input type="hidden" name="id" value="<?= $_POST['id'] ?>">

                <div class="botao">
                    <button class="botao-custom" type="submit">Editar</button>
                </div>
            </form> 

            <a href="../CreateUsuario/createUsuario.php" class="voltar">Voltar para usuários</a> 

        </main>
        <footer>
            <div class="copy">&copy 2020</div>
        </footer>
    </body>
</html>