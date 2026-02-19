<?php
// Arquivo: config/db_config.php
// Variáveis de configuração de acesso ao banco de dados
// Substitua os valores abaixo pelas credenciais reais do seu ambiente

$db_host = 'localhost';
$db_name = 'u836476048_pg005_db';
$db_user = 'u836476048_pg005_user';
$db_pass = 'Unialcance2025*';
$db_charset = 'utf8mb4';

// DSN (Data Source Name) para uso com PDO
$dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_charset";

// Exemplo de criação de conexão PDO (descomente para usar)
/*
try {
    $pdo = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    // Em produção não exponha detalhes sensíveis
    die('Falha na conexão com o banco de dados.');
}
*/
