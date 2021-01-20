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

$pdo = new PDO($dsn, $user, $pass, $options);

$sql = "SELECT 
customers.id as customer_id, 
customers.name as cutomer_name,
surname,
products.id as products_id, 
`type`,
products.name as vegetable

FROM customers
RIGHT JOIN products
ON customers.id = products.customer_id
WHERE customers.name = 'Jonas'
ORDER BY customers.name;";

$stmt = $pdo->query($sql);

while ($row = $stmt->fetch()) {
     $masyvas[] = $row;
}

_d($masyvas);