<?php
session_start();
require_once 'connection.php';
require_once 'carModel.php';

$carModel = new CarModel();
$vehicles = $carModel->getVehicle(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bookCar.css">
    <title>List of Cars</title>
</head>
<body>
    <section>
        <h1>Our Vehicles</h1>
        <p>Browse our selection of clean, well-maintained vehicles.</p>
    </section>

    <div class="container">
        <?php if ($vehicles && $vehicles->num_rows > 0): ?> 
            <?php while ($vehicle = $vehicles->fetch_assoc()): ?> 
            <div class="car-item">
            <div class="car-pic">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($vehicle['carImage']); ?>" alt="Car Image">
                </div>

                <div class="carInfo">
                    <form action="sessionList.php" method="POST">
                    <h2><?php echo $vehicle['vehicle_name']; ?></h2>
                    <p>Price from: ₱<?php echo number_format($vehicle['price']); ?></p>
                    <input type="hidden" name="vehicle_name" value="<?php echo $vehicle['vehicle_name']; ?>">
                    <input type="hidden" name="price" value="<?php echo $vehicle['price']; ?>">
                    <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['id']; ?>">
                    <button type="submit" class="btn btn-primary">Book now</button>
                    </form>
                    <hr class="infoHR">

                    <div class="icons">
                        <span class="icon-item"><img src="passenger.png" alt="Passenger Icon"> 5</span>
                        <span class="icon-item"><img src="luggage.png" alt="Luggage Icon"> 5</span>
                        <span class="icon-item"><img src="automatic.png" alt="Automatic"> A</span>
                    </div>

                    <hr class="infoHR">
                </div>
            </div>
            <hr>
            <?php endwhile; ?> <!-- End of while loop -->
        <?php else: ?>
            <p>No vehicles found.</p>
        <?php endif; ?>
    </div>
<hr>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
