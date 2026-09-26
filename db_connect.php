<?php
$host = 'localhost';
$dbname = 'tailor_shop';
$username = 'root';   // default XAMPP/WAMP username
$password = '';        // default XAMPP/WAMP password is empty

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    http_response_code(500);
    die(json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]));
}