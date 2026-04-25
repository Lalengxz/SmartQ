<?php
session_start();
include_once '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if ($password !== $confirm) {
        $_SESSION['error'] = "Passwords do not match";
        header('Location: ../../../client/pages/signup.php');
        exit();
    }

    $database = new Database();
    $db = $database->getConnection();

    // Check if username exists
    $stmt = $db->prepare("SELECT id FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['error'] = "Username already exists";
        header('Location: ../../../client/pages/signup.php');
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $db->prepare("INSERT INTO users (firstname, lastname, username, email, password) VALUES (:firstname, :lastname, :username, :email, :password)");
    
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Account created successfully. Please login.";
        header('Location: ../../../client/pages/login.php');
        exit();
    } else {
        $_SESSION['error'] = "There was an error creating your account. Please try again.";
        header('Location: ../../../client/pages/signup.php');
        exit();
    }
}
?>
