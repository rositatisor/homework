<?php

$host = '127.0.0.1';
$db   = 'darzoviu_baze';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// CREATE
$pdo = new PDO($dsn, $user, $pass, $options);

// UPDATE
$sql = "INSERT INTO `products` (`type`, `name`, `price`)
VALUES (1, 'Agurkas', 0.78)";
$pdo->query($sql);

$sql = "INSERT INTO `products` (`type`, `name`, `price`)
VALUES (1, 'Pomidoras', 8.78)";
$pdo->query($sql);

$sql = "UPDATE products
SET price=0.36
WHERE `name`='Agurkas';";
$pdo->query($sql);

// DELETE
$sql = "DELETE FROM products
WHERE `name`='Agurkas';";
$pdo->query($sql);

// $sql = "DELETE FROM products
// WHERE `name`='Pomidoras';";
// $pdo->query($sql);

// READ
$sql = "SELECT `id`, `type`, `name`, `price` FROM `products`
WHERE `type` = 2 OR `type` = 3
ORDER BY `price` DESC;";
$stmt = $pdo->query($sql);

while ($row = $stmt->fetch()) {
     $masyvas[] = $row;
}

_d($masyvas);