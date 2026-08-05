<?php
/* Configura a conexão com banco de dados */
$host = $_ENV['MYSQLHOST'] ?? getenv('MYSQLHOST');
$db   = $_ENV['MYSQL_DATABASE'] ?? getenv('MYSQL_DATABASE');
$user = $_ENV['MYSQLUSER'] ?? getenv('MYSQLUSER');
$pass = $_ENV['MYSQLPASSWORD'] ?? getenv('MYSQLPASSWORD');
$port = $_ENV['MYSQLPORT'] ?? getenv('MYSQLPORT');

$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}