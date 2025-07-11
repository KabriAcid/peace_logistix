<?php
require __DIR__ . '/../config/database.php';

$username = 'acid_legend';
$password = 'Pa$$w0rd!';

$password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
$result = $stmt->execute([$username, $password]);

if (!$result) {
    die("Error occured");
}