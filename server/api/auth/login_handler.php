<?php
session_start();
include_once '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $database = new Database();
    $db = $database->getConnection();

    // Check in users table (matching the original logic)
    $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        // Redirect to dashboard
        header('Location: ../../../client/pages/admin/dashboard.php');
        exit();
    } else {
        $_SESSION['error'] = "Invalid username or password";
        header('Location: ../../../client/pages/login.php');
        exit();
    }
}
?>
