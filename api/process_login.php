<?php
session_start();
require_once __DIR__ . '/../config/database.php';

header("Content-Type: application/json");

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate input
    if (empty($username) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Username and password are required.']);
        exit();
    }

    // Check credentials in the database
    $stmt = $pdo->prepare("SELECT id, password FROM admins WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Set session for the logged-in user
        $_SESSION['user_id'] = $user['id'];
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);
    }
    exit();
}

// If not a POST request, return an error
echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
exit();
