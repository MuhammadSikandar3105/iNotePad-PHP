<?php
include("db/conn.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Prepare the SQL query
$query = "SELECT title, description, tag, id FROM notes WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<div class='d-flex flex-wrap'>";

while ($row = $result->fetch_assoc()) {
    // Assign the theme class based on session
    $themeClass = isset($_SESSION['theme']) && $_SESSION['theme'] == 'light' ? 'light-mode' : 'dark-mode';
    
    echo "<div class='card m-2 $themeClass' style='width: 18rem; height: 23rem;'>"; // Inject theme class here
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>" . htmlspecialchars($row['title']) . "</h5>";
    echo "<p class='card-text'>" . htmlspecialchars($row['description']) . "</p>";
    
    // Tag with green color
    echo "<small class='my-1' style='color: green;'>" . htmlspecialchars($row['tag']) . "</small>";

    // Edit and Delete buttons with Font Awesome icons
    echo "<div class='mt-3'>";
    echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning me-2'>Edit</a>";
    echo "<a href='deletenote.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger'>Delete</a>";
    echo "</div>";

    echo "</div>";
    echo "</div>";
}

echo "</div>";

$stmt->close();
$conn->close();
?>
