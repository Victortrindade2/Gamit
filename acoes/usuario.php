<?php
session_start();

// Ativa exibição de erros temporariamente para você ver na tela se algo mais falhar
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config.php';

// CORREÇÃO: Limpando a duplicidade da leitura do POST
$acao = $_POST['acao'] ?? '';

switch($acao){
    case 'criar':
        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $data_nasc = trim($_POST['data_nasc'] ?? '');
        $senha = $_POST['senha'] ?? '';
        $senha_confirm = $_POST['confirmPassword'] ?? '';

        // Validação básica se os campos estão vazios para evitar erros no banco
        if (empty($nome) || empty($email) || empty($senha)) {
            $_SESSION['erro_cadastro'] = "Por favor, preencha todos os campos obrigatórios.";
            header('Location: ../cadastro/cadastro.php');
            exit();
        }

        if($senha !== $senha_confirm){
            $_SESSION['erro_cadastro'] = "As senhas digitadas devem ser iguais";
            header('Location: ../cadastro/cadastro.php'); 
            exit();
        }

        try {
            $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha, data_nasc) VALUES (?, ?, ?, ?)");
            
            // CORREÇÃO: Mudado de PASSWORD_ARGON2ID para PASSWORD_DEFAULT (Bcrypt)
            // O Bcrypt é extremamente seguro e funciona nativamente no Railway sem travar
            $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
            
            $stmt->execute([$nome, $email, $senha_criptografada, $data_nasc]);

            header('Location: ../login/login.php');
            exit();
            
        } catch (\PDOException $e) {
            // Se o banco falhar (ex: coluna com nome errado, tabela inexistente ou email duplicado)
            // Ele vai printar o erro na tela ao invés de dar a tela de erro 500
            die("Erro ao salvar no banco de dados: " . $e->getMessage());
        }

    default:
        header('Location: ../login/login.php');
        exit();
}
