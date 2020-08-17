<?php 

// require ("../Required/loginUsuario.php");

?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="login.css">
        <title>Login</title>
    </head>
    <body>
        <main class="modal">
            <form method="POST" action="../Required/loginUsuario.php">
                <div class="titulo">
                    <h1>Login</h1><br>
                </div>
                <div class="input"> 
                    <label for="email">Email</label><br>
                    <input class="input-custom" type="email" name="email" id="email" required><br>
                </div>
                <div class="input">
                    <label for="password">Senha</label><br>
                    <input class="input-custom" type="password" name="password" id="password" required><br>
                </div>
                <div class="links">
                    <p><a href="#">Esqueceu a senha?</a></p>
                    <p><a href="../CreateUsuario/createUsuario.php">Cadastre-se</a></p>
                </div>
                <div class="botao">
                    <input class="botao-custom" type="submit" value="Entrar">
                </div>
            </form>
        </main>
        <footer>&copy 2020</footer>
    </body>
</html>