<?php
include 'dbconnect.php';

$msg = "";
if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    //echo "$password, $hashed_password";
    
    // Insert the new user into the database
    $stmt = $con->prepare("INSERT INTO adminusers (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        $msg = "User registered successfully.";
        header('Location: login.php');
    } else {
        $msg = "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Admin Signup</h2>
        <form method="POST" action="" class="mt-4">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="submit">Signup</button>
        </form>
        <div class="text-success text-center mt-3"><?php echo htmlspecialchars($msg); ?></div>
    </div>
</body>
</html>
