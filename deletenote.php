<?php
session_start();
include("db/conn.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $note_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Prepare and execute the SQL query
    $query = "DELETE FROM notes WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii', $note_id, $user_id);

    if ($stmt->execute()) {
        // Redirect back to notes page with success message
        header("Location: mainnote.php?message=Note deleted successfully");
    } else {
        // Handle failure
        echo "Error deleting note.";
    }

    $stmt->close();
}

$conn->close();
?>
