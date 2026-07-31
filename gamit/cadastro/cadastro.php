<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cadastro.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Bem-vindo</h2>
    <form id="loginform">
        <div class="nome">
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
        <div class="email" accesskey="email"> 
            <input type="email" 
            name="email"
            id="email"
            autocomplete="email"
            required
            placeholder="Digite seu email"
            max-length="255">
        </div>
        <div class="data">
            <input type="date" 
            name="data"
            id="data"
            required
            placeholder="Digite sua data de nascimento">
        </div>
        <div class="senha">
            <input 
            type="password" 
            name="password"
            id="senha"
            autocomplete="current-password"
            required
            placeholder="Digite uma senha"
            max-length="255"
            >
        </div>
        <div class="confirmar-senha">
            <input 
            type="password" 
            name="confirmPassword"
            id="confirmar"
            autocomplete="current-password"
            required
            placeholder="Confirme a Senha"
            max-length="255"
            >
        </div>
        <button class="cadastrar" type="submit" form="loginform">Criar Conta</button>
    </form>
    <h3 class="entrar">Já tem uma Conta? <a class="login" href="../login/login.php"> Entrar em uma conta</a></h3>

    <?php
    // PHP code for login functionality
    ?>
</body>
</html>