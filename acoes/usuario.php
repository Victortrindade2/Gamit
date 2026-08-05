<?php
session_start();
require_once '../config.php';

$acao = $_POST['acao'] ?? $_POST['acao'] ?? '';

switch($acao){
    case 'criar':
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $data_nasc = trim($_POST['data_nasc']);
        $senha = $_POST['senha'];
        $senha_confirm = $_POST['confirmPassword'];

        if($senha !== $senha_confirm){
            $_SESSION['erro_cadastro'] = "As senhas digitadas devem ser iguais";
            header('Location: ../cadastro/cadastro.php'); 
            exit();
        }

        $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha, data_nasc) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nome, $email, password_hash($senha, PASSWORD_ARGON2ID), $data_nasc]);

        header('Location: ../login/login.php');
        exit();
    default:
        header('Location: ../login/login.php');
        exit();
}