<?php
include("db/conn.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(strip_tags($_POST['name']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $phone = htmlspecialchars(strip_tags($_POST['phone']));
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $check_query = "SELECT * FROM signup WHERE email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    
    if ($result->num_rows == 1) {
        echo "User already exists with this email!";
        $stmt->close();
    } else {
        $stmt->close();
        $query = "INSERT INTO signup (name, email, phone, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssss', $username, $email, $phone, $hashed_password);

        if ($stmt->execute()) {
            include('loginForm.php');
        } else {
            echo "Error during signup. Please try again.";
        }
    }
}


$conn->close();
?>