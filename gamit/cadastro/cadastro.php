<?php session_start(); ?>
<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cadastro.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar-se</title>
</head>
<body>
    <h2>Bem-vindo</h2>

    <form action="../acoes/usuario.php" method="POST" id="loginform">
        <input type="hidden" name="acao" value="criar">
        <div class="nome">
            <input 
            type="text" 
            name="nome"
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
            name="data_nasc"
            id="data"
            required
            placeholder="Digite sua data de nascimento">
        </div>
        <div class="senha">
            <input 
            type="password" 
            name="senha"
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
        <?php

            if(isset($_SESSION['erro_cadastro'])): ?>
            <p class="errorMessage"><?php echo $_SESSION['erro_cadastro']; ?></p>
            <?php 
            unset($_SESSION['erro_cadastro']); // Apaga o erro para não repetir ao atualizar a página
                endif; 
        ?>
    </form>


    <h3 class="entrar">Já tem uma Conta? <a class="login" href="../login/login.php"> Entrar em uma conta</a></h3>
</body>
</html>