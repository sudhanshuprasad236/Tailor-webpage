<?php
require 'db_connect.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$name    = trim($data['name'] ?? '');
$phone   = trim($data['phone'] ?? '');
$service = trim($data['service'] ?? '');
$date    = trim($data['date'] ?? '');
$notes   = trim($data['notes'] ?? '');

if ($name === '' || $phone === '' || $service === '' || $date === '') {
    http_response_code(400);
    echo json_encode(['error' => 'Please fill in all required fields.']);
    exit;
}

$stmt = $pdo->prepare(
    "INSERT INTO bookings (name, phone, service, booking_date, notes)
     VALUES (?, ?, ?, ?, ?)"
);
$stmt->execute([$name, $phone, $service, $date, $notes]);

echo json_encode([
    'success' => true,
    'bookingId' => $pdo->lastInsertId(),
]);