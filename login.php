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
    <p> Sample Data for login(username=MeherNiger, password=abc)</p>
    <div class="container mt-5">
        <h2 class="text-center">Admin Login</h2>

        <?php
        session_start();
        include 'dbconnect.php';

        $msg="";
        if(isset($_POST['submit'])){
            $username=$_POST['username'];
            $password=$_POST['password'];
            
            $sql="select * from adminusers where username='$username' and password='$password'";
            $res=mysqli_query($con,$sql);
            if(mysqli_num_rows($res)>0){
                $row=mysqli_fetch_assoc($res);
                $_SESSION['IS_LOGIN']='yes';
                $_SESSION['ADMIN_USER']=$row['username'];
                header('Location: dashboard.php');
            }else{
                $msg="Please enter valid login details";
            }
        }

        ?>

        <form method="POST" action="" class="mt-4">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="submit">Login</button>
        </form>
        <div class="text-danger text-center mt-3"><?php echo htmlspecialchars($msg); ?></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>