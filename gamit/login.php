<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Bem-vindo</h2>
    <form id="loginform">
        <div class="nome" id="nome">
            <input 
            type="text" 
            name="username"
            id="nome"
            autocomplete="username"
            required
            placeholder="Digite seu nome"
            max-length="60"
            >
        </div>
        <div class="senha" id="senha">
            <input 
            type="password" 
            name="password"
            id="senha"
            autocomplete="current-password"
            required
            placeholder="Digite sua senha"
            max-length="255"
            >
        <div class="email" accesskey="email"> 
            <input type="email" 
            name="email"
            id="email"
            autocomplete="email"
            required
            placeholder="Digite seu email"
            max-length="255">
        </div>
        <div class="data" id="data">
            <input type="date" 
            name="data"
            id="data"
            required
            placeholder="Digite sua data de nascimento">
        </div>
    </form>
    <button class="entrar" type="submit" form="loginform">Entrar</button>
    <h3 class="cadastrar">Não tem uma conta? <a class="cadastro" href="cadastro.php"> Cadastre-se</a></h3>

    <?php
    // PHP code for login functionality
    ?>
</body>
</html>