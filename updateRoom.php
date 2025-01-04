<?php
// Include header
include 'header.php';
?>

<!-- Update Room Page -->
<div class="container mt-5">
        <h2>Update Room</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Database connection
            include 'dbconnect.php';

            // Fetch form data
            $roomId = $_POST['updateRoomId'];
            $roomType = $_POST['updateRoomType'];
            $roomPrice = $_POST['updateRoomPrice'];
            $roomStatus = $_POST['updateRoomStatus'];

            // Prepare SQL for updating only type, price, and/or status
            $updates = [];
            $params = [];
            $types = '';

            if (!empty($roomType)) {
                $updates[] = "type = ?";
                $params[] = $roomType;
                $types .= 's';
            }

            if (!empty($roomPrice)) {
                $updates[] = "price = ?";
                $params[] = $roomPrice;
                $types .= 'd';
            }

            if (!empty($roomStatus)) {
                $updates[] = "status = ?";
                $params[] = $roomStatus;
                $types .= 's';
            }

            if (!empty($updates)) {
                $sql = "UPDATE Rooms SET " . implode(', ', $updates) . " WHERE id = ?";
                $params[] = $roomId;
                $types .= 'i';

                $stmt = $con->prepare($sql);
                $stmt->bind_param($types, ...$params);

                if ($stmt->execute()) {
                    echo '<div class="alert alert-success">Room updated successfully!</div>';
                } else {
                    echo '<div class="alert alert-danger">Error: ' . $con->error . '</div>';
                }

                $stmt->close();
            }
            $con->close();
        }
        ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="updateRoomId" class="form-label">Room ID</label>
                <input type="text" class="form-control" name="updateRoomId" id="updateRoomId" placeholder="Enter room ID to update" required>
            </div>
            <div class="mb-3">
                <label for="updateRoomType" class="form-label">Room Type</label>
                <input type="text" class="form-control" name="updateRoomType" id="updateRoomType" placeholder="Enter new room type">
            </div>
            <div class="mb-3">
                <label for="updateRoomPrice" class="form-label">Price</label>
                <input type="number" class="form-control" name="updateRoomPrice" id="updateRoomPrice" placeholder="Enter new price">
            </div>
            <div class="mb-3">
                <label for="updateRoomStatus" class="form-label">Status</label>
                <select class="form-select" name="updateRoomStatus" id="updateRoomStatus">
                    <option value="">Select status</option>
                    <option value="Available">Available</option>
                    <option value="Occupied">Occupied</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Room</button>
        </form>
    </div>

<?php
// Include footer
include 'footer.php';
?>
