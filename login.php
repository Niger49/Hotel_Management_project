<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Admin Login</h2>

        <?php
        session_start();
        include 'dbconnect.php';

        $msg = "";
        if (isset($_POST['submit'])) {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            // Use prepared statement to fetch user details
            $stmt = $con->prepare("SELECT * FROM adminusers WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                $t = $row['password'];

               // echo "$password, $t";

                // Verify the password hash
                if (password_verify($password, $row['password'])) {
                    $_SESSION['IS_LOGIN'] = 'yes';
                    $_SESSION['ADMIN_USER'] = $row['username'];
                    header('Location: dashboard.php');
                    exit();
                } else {
                    $msg = "Invalid password.";
                }
            } else {
                header('Location: signup.php');
                //$msg = "Invalid username.";
            }
            $stmt->close();
        }
        ?>

        <form method="POST" action="" class="mt-4">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="submit">Login</button>
        </form>
        <div class="text-danger text-center mt-3"><?php echo htmlspecialchars($msg); ?></div>
    </div>
</body>
</html>
