<?php
session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['IS_LOGIN'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">Hotel Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="addRoom.php">Add Room</a></li>
                    <li class="nav-item"><a class="nav-link" href="updateRoom.php">Update Room</a></li>
                    <li class="nav-item"><a class="nav-link" href="deleteRoom.php">Delete Room</a></li>
                    <li class="nav-item">
                        <form action="logout.php" method="POST">
                            <button type="submit" name="logout" class="logout-btn">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
