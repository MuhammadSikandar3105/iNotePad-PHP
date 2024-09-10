<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- fevicon -->
     <link rel="apple-touch-icon" sizes="180x180" href="assets/images/png-transparent-computer-icons-notepad-others-thumbnail-removebg-preview.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/png-transparent-computer-icons-notepad-others-thumbnail-removebg-preview.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/png-transparent-computer-icons-notepad-others-thumbnail-removebg-preview.png">
    <link rel="manifest" href="/site.webmanifest">
    <!-- bootstrape link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<title>Inotebook</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="signupForm.php">iNotePad</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="signupForm.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-disabled="true">About</a>
                    </li>
                </ul>
                <a href="loginForm.php" type="button" class="btn btn-primary mx-1">Login</a>
                <a href="signupForm.php" type="button" class="btn btn-primary mx-1">Signup</a>
            </div>
        </div>
    </nav>
    <main>
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
            <div class="col-md-6 p-lg-5 mx-auto my-5">
                <h1 class="display-3 fw-bold">Private Notes</h1>
                <h3 class="fw-normal text-muted mb-3">Your notes are secured</h3>
                <h3 class="fw-normal text-muted mb-3">To see notes please login or signup</h3>
                <div class="d-flex gap-3 justify-content-center lead fw-normal">
                    <a class="icon-link" href="#">
                        Learn more
                        <svg class="bi">
                            <use xlink:href="#chevron-right"></use>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
    </main>

    <!-- bootstrape js linkk -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>