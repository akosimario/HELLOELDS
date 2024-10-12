<?php
require_once 'connection.php';
require_once 'carModel.php';

$carModel = new CarModel();
$result = $carModel->getAllBookings(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Admin Panel</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Manage Bookings</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Renter</th>
                    <th>Pick-up Time</th>
                    <th>Drop-off Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['bookingID']; ?></td>
                            <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                            <td><?php echo $row['pick_up_time']; ?></td>
                            <td><?php echo $row['dropoff_time']; ?></td>
                            <td><?php echo ucfirst($row['status']); ?></td>
                            <td>
                                <form action="adminController.php" method="POST">
                                    <input type="hidden" name="bookingID" value="<?php echo $row['bookingID']; ?>">
                                    <input type="hidden" name="vehicle_id" value="<?php echo $row['vehicle_id']; ?>">
                        <?php if ($row['status'] == 'pending'): ?>
                            <button type="submit" name="status" value="pending" class="btn btn-warning" disabled>Pending</button>
                            <button type="submit" name="status" value="confirmed" class="btn btn-success">Confirmed</button>
                            <button type="submit" name="status" value="cancelled" class="btn btn-danger">Cancelled</button>
                        <?php elseif ($row['status'] == 'confirmed'): ?>
                            <button type="submit" name="status" value="pending" class="btn btn-warning" >Pending</button>
                            <button type="submit" name="status" value="confirmed" class="btn btn-success"disabled>Confirmed</button>
                            <button type="submit" name="status" value="cancelled" class="btn btn-danger">Cancelled</button>
                        <?php elseif ($row['status'] == 'cancelled'): ?>
                            <button type="submit" name="status" value="pending" class="btn btn-warning" >Pending</button>
                            <button type="submit" name="status" value="confirmed" class="btn btn-success">Confirmed</button>
                            <button type="submit" name="status" value="cancelled" class="btn btn-danger"disabled>Cancelled</button>
                            <?php else:?>
                            <button type="submit" name="status" value="pending" class="btn btn-warning" >Pending</button>
                            <button type="submit" name="status" value="confirmed" class="btn btn-success">Confirmed</button>
                            <button type="submit" name="status" value="cancelled" class="btn btn-danger">Cancelled</button>
                        <?php endif; ?>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No bookings found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
