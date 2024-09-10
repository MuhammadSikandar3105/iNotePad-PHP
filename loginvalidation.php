<?php
include("db/conn.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $password = $_POST['password'];

    $query = "SELECT roll_no, name, password FROM signup WHERE email = ?";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param('s', $email);
    $stmt->execute();

    $stmt->bind_result($user_id, $name, $hashed_password );

    if ($stmt->fetch()) {
        echo "Hashed password from DB: " . $hashed_password . "<br>";

        if (password_verify($password, $hashed_password)) {
            echo "Password verified successfully.<br>";
            // Store user details in session variables
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $name;
            header("Location: mainnote.php");
            exit;
        } else {
            // Debugging: Show password and hashed password for comparison
            echo "Password does not match!<br>";
            echo "Entered Password: " . $password . "<br>";
            echo "Hashed Password from DB: " . $hashed_password . "<br>";
            echo "password_verify result: " . (password_verify($password, $hashed_password) ? 'true' : 'false') . "<br>";
        }
    } else {
        // Debugging: No user found with the given email
        echo "No user found with this email!<br>";
    }

    $stmt->close();
}
$conn->close();


?>