<?php
    require_once 'carModel.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $brand = $_POST['brand'];
        $vehicle_name = $_POST['vehicle-name'];
        $capacity = $_POST['capacity'];
        $transmission = $_POST['transmission'];
        $color = $_POST['color'];
        $year_model = $_POST['year-model'];
        $availability = $_POST['availability'];
        $price = $_POST['price'];
        $carImage = $_FILES['image'];

       
        if ($carImage['error'] == 0) {
            $imageBlob = file_get_contents($carImage['tmp_name']);
            $carModel = new CarModel();
            $result = $carModel->addVehicle($brand, $vehicle_name, $capacity, $transmission, $color, $year_model, $availability, $imageBlob,$price);
           
        } else {
            echo "Error uploading the image!";
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addCar.css">
    <title>Add Vehicle</title>
</head>
<body>

<div class="add-vehicle">
    <form method="post" id="add-vehicles" enctype="multipart/form-data">
        <div class="container">
            <div class="header-container">
                <h1>Add Vehicle</h1>
                <i id="close-btn" class="fa-solid fa-x" style="font-size:25px;"></i>
            </div>

            <label for="brand">Brand</label>
            <input name="brand" type="text" placeholder="Brand" required>

            <label for="vehicle-name">Name</label>
            <input name="vehicle-name" type="text" placeholder="Vehicle Name" required>

            <label for="capacity">Seating Capacity</label>
            <select name="capacity" id="seating-capacity" required>
                <option value="5 Seaters">5 Seaters</option>
                <option value="7 Seaters">7 Seaters</option>
            </select>

            <label for="transmission">Transmission</label>
            <select name="transmission" id="transmission" required>
                <option value="Automatic">Automatic</option>
                <option value="Manual">Manual</option>
            </select>

            <label for="color">Color</label>
            <input name="color" type="text" placeholder="Color" required>

            <label for="year-model">Year Model</label>
            <input name="year-model" type="text" placeholder="Year Model" pattern="\d{4}" title="Enter a valid year (e.g., 2021)" required>

            <label for="availability">Availability</label>
            <select name="availability" id="availability" required>
                <option value="Available">Available</option>
                <option value="Not Available">Not Available</option>
            </select>

            <label for="image">Upload Image</label>
            <input name="image" type="file" required>
            <label for="price">price</label>
            <input name="price" type="text" placeholder="price" required>

            <input id="confirm-submission" type="submit" value="Confirm">
        </div>
    </form>

</div>

</body>
</html>
