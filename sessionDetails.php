<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['booking_details'] = [
        'contact' => $_POST['contact'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'primary_id' => $_POST['primary_id'],
        'pickup_time' => $_POST['pickup_time'],
        'dropoff_time' => $_POST['dropoff_time'],
        'pickup_location' => $_POST['pickup_location'],
        'return_location' => $_POST['return_location'],
        'vehicle_id' => $_POST['vehicle_id'], // Ensure vehicle_id is passed and stored in the session
    ];
    
        header("Location: bookingUpload.php");
         exit();
}
