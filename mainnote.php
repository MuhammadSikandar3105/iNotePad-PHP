<?php
session_start(); // Ensure session_start() is the first line
include("db/conn.php");

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;

}
if (!isset($_SESSION['theme'])) {
    $_SESSION['theme'] = 'light';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
     <!-- fevicon -->
     <link rel="apple-touch-icon" sizes="180x180" href="assets/images/png-transparent-computer-icons-notepad-others-thumbnail-removebg-preview.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/png-transparent-computer-icons-notepad-others-thumbnail-removebg-preview.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/png-transparent-computer-icons-notepad-others-thumbnail-removebg-preview.png">
    <link rel="manifest" href="/site.webmanifest">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>iNotePad</title>
</head>

<body class="<?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == 'dark-mode' ? 'dark' : 'light-mode'; ?>" >

    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="#">iNotePad</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="notes.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <button id="themeToggleBtn" class="btn btn-outline-secondary me-2">Toggle Dark Mode</button>
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="assets/images/IMG_6513.JPG" alt="mdo" width="32" height="32"
                                class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small" style="">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- add notes form -->
        <div class="inputform d-flex justify-content-center aligns-item-center my-4">
            <form style="width:700px" method="POST" action="noteValidation.php">
                <h3>Add Your Notes</h3>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" required >
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="description form-control" name="description" id="description" rows="6"
                        cols="90" required ></textarea>
                </div>
                <div class="mb-3">
                    <label for="tag" class="form-label">Tag</label>
                    <input type="text" name="tag" class="form-control" id="tag">
                </div>
                <button type="submit" class="btn btn-primary">Add Note</button>
            </form>
        </div>
        <!-- all notes -->

        <div class="container my-3">
            <h3>All Notes</h3>
        </div>

        <?php 
         include("addNote.php");
        ?>
        <script src="js/script.js"></script>
        <!-- bootstrape js linkk -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"></script>
</body>

</html>