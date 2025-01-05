<?php
include 'dbconnect.php';

$sql = "SELECT id, password FROM adminusers";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $hashed_password = password_hash($row['password'], PASSWORD_DEFAULT);

        // Update the password in the database
        $update_sql = "UPDATE adminusers SET password = '$hashed_password' WHERE id = $id";
        $con->query($update_sql);
    }
    echo "Passwords updated successfully.";
} else {
    echo "No users found.";
}

$con->close();
?>
