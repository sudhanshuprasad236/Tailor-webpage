<?php
require 'db_connect.php';
header('Content-Type: application/json');

$stmt = $pdo->query("SELECT * FROM bookings ORDER BY created_at DESC");
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($bookings);