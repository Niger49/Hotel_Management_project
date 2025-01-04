<?php
// Include header
include 'header.php';
?>

<!-- Dashboard Page -->
<div class="container mt-5">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['ADMIN_USER']); ?>!</h2>
    <h3>Dashboard</h3>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th width="5%">Room ID</th>
                <th width="7%">Room Type</th>
                <th width="5%">Price</th>
                <th width="8%">Status</th>
                <th width="10%">Actions</th>
            </tr>
        </thead>
        <tbody id="roomTable">
            <?php
            // Database connection
            include 'dbconnect.php';

            // Fetch room data
            $sql = "SELECT * FROM Rooms";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['type']}</td>
                        <td>\${$row['price']}</td>
                        <td>{$row['status']}</td>
                        <td>
                            <a href='updateRoom.php?id={$row['id']}' class='btn btn-warning btn-sm'>Update</a>
                            <a href='deleteRoom.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>No rooms available</td></tr>";
            }

            $con->close();
            ?>
        </tbody>
    </table>
</div>

<?php
// Include footer
include 'footer.php';
?>

