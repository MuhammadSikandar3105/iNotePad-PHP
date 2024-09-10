<?php
include("db/conn.php");
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}

// Get the logged-in user's ID
$user_id = $_SESSION['user_id'];

$title = $_POST['title'];
$description = $_POST['description'];   
$tag = $_POST['tag'];

// Prepare the SQL query to include user_id
$sql = $conn->prepare('INSERT INTO notes (title, description, tag, user_id) VALUES (?, ?, ?, ?)');
$sql->bind_param('sssi', $title, $description, $tag, $user_id);

// Execute the query
if ($sql->execute()) {
    // Redirect to mainnote.php after successful insert
    header("Location: mainnote.php");
    exit;
} else {
    echo "Error: Could not save the note.";
}

$conn->close();
?>
