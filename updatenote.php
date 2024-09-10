<?php
session_start();
include("db/conn.php");

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $note_id = $_POST['note_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $tag = $_POST['tag'];

    // Update the note in the database
    $query = "UPDATE notes SET title = ?, description = ?, tag = ? WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssii', $title, $description, $tag, $note_id, $user_id);

    if ($stmt->execute()) {
        // Redirect to the notes page after successful update
        header("Location: mainnote.php");
    } else {
        echo "Error updating the note!";
    }

    $stmt->close();
}

$conn->close();
?>