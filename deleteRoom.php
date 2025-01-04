<?php
// Include header
include 'header.php';
?>

<!-- Delete Room Page -->
<div class="container mt-5">
        <h2>Delete Room</h2>
        <?php

        // Database connection
        include 'dbconnect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Fetch form data
            $roomId = $_POST['deleteRoomId'];

            // Check if room exists
            $checkSql = "SELECT * FROM Rooms WHERE id = ?";
            $checkStmt = $con->prepare($checkSql);
            $checkStmt->bind_param('i', $roomId);
            $checkStmt->execute();
            $result = $checkStmt->get_result();

            if ($result->num_rows > 0) {
                // Room exists, proceed to delete
                $sql = "DELETE FROM Rooms WHERE id = ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param('i', $roomId);

                if ($stmt->execute()) {
                    echo '<div class="alert alert-success">Room deleted successfully!</div>';
                } else {
                    echo '<div class="alert alert-danger">Error deleting room: ' . $con->error . '</div>';
                }
                $stmt->close();
            } else {
                // Room does not exist
                echo '<div class="alert alert-danger">Room ID not found in the database!</div>';
            }
            $checkStmt->close();
            $con->close();
        }
        ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="deleteRoomId" class="form-label">Room ID</label>
                <input type="text" class="form-control" name="deleteRoomId" id="deleteRoomId" placeholder="Enter room ID to delete" required>
            </div>
            <button type="submit" class="btn btn-danger">Delete Room</button>
        </form>
    </div>

<?php
// Include footer
include 'footer.php';
?>