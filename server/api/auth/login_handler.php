<?php
session_start();
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login_input = $_POST['username']; // This could be email or username
    $password = $_POST['password'];

    $database = new Database();
    $db = $database->getConnection();

    // 1. Try checking Admin table
    $query = "SELECT amdin_id as id, first_name, last_name, email, admin_pass as password FROM admin WHERE email = :email LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email', $login_input);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $role = 'admin';

    // 2. If not found in Admin, try Students table
    if (!$user) {
        $query = "SELECT student_id as id, first_name, last_name, email, student_pass as password FROM students WHERE email = :email LIMIT 1";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $login_input);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $role = 'student';
    }

    // 3. Verify password (supporting both plaintext for legacy and hashed for security)
    if ($user && ($password === $user['password'] || password_verify($password, $user['password']))) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $role;

        // Redirect based on role
        if ($role === 'admin') {
            header('Location: ../../../client/pages/admin/dashboard.php');
        } else {
            // Redirect students to their landing page (adjust as needed)
            header('Location: ../../../client/index.php');
        }
        exit();
    } else {
        $_SESSION['error'] = "Invalid email or password";
        header('Location: ../../../client/pages/login.php');
        exit();
    }
}
?>