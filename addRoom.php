<?php
// Include header
include 'header.php';
?>

 
 <!-- Add Room Page -->
 <div class="container mt-5">
        <h2>Add Room</h2>
        <?php
        require 'dbconnect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $type = $_POST['roomType'];
            $price = $_POST['roomPrice'];
            $status = $_POST['roomStatus'];

            $sql = "INSERT INTO rooms (type, price, status) VALUES ('$type', '$price', '$status')";
            if ($con->query($sql) === TRUE) {
                echo "New room added successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
            $con->close();
        }
        ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="roomType" class="form-label">Room Type</label>
                <input type="text" class="form-control" name="roomType" id="roomType" placeholder="Enter room type" required>
            </div>
            <div class="mb-3">
                <label for="roomPrice" class="form-label">Price</label>
                <input type="number" class="form-control" name="roomPrice" id="roomPrice" placeholder="Enter room price" required>
            </div>
            <div class="mb-3">
                <label for="roomStatus" class="form-label">Status</label>
                <select class="form-select" name="roomStatus" id="roomStatus">
                    <option value="Available">Available</option>
                    <option value="Occupied">Occupied</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Add Room</button>
        </form>
    </div>

<?php
// Include footer
include 'footer.php';
?>