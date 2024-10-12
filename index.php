
<?php
session_start(); 

if (!isset($_SESSION['vehicle']['vehicle_name'])) {
    echo "<p>Error: No car selected. Please go back and choose a vehicle.</p>";
    exit();
}

$carName = $_SESSION['vehicle']['vehicle_name'];
$vehicleId = $_SESSION['vehicle']['vehicle_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Booking Form</title>
</head>
<body>
<div class="form-container">
        <h1 class="lblBooking">Booking</h1>

        <form action="sessionDetails.php" method="POST"> 
            <h2 class="lblDetails">Contact Details</h2>
            <div class="form-group">
                <input type="text" name="contact" placeholder="Email Address or Contact No." class="form-control" required>
            </div>

            <h2 class="lblDetails">Renter</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="first_name" placeholder="First Name" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="last_name" placeholder="Last Name" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <select name="primary_id" class="form-select" aria-label="Default select example" required>
                    <option value="" disabled selected>Select Primary ID</option>
                    <option value="passport">Passport</option>
                    <option value="license">Driver's License</option>
                    <option value="PostalId">Postal Id</option>
                    <option value="GSISID">GSIS ID</option>
                </select>
            </div>

            <h2 class="lblDetails">Pick-up/Time</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="datetime-local" name="pickup_time" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="datetime-local" name="dropoff_time" class="form-control" required>
                    </div>
                </div>
            </div>

            <h2 class="lblDetails">Location</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="pickup_location" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="return_location" class="form-control" required>
                    </div>
                </div>
            </div>
            <input type="hidden" name="vehicle_id" value="<?php echo $vehicleId; ?>">
            
            <button type="submit" class="btn w-100 mt-3">Proceed to payment proof</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
