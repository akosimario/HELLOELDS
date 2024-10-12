<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['contact'])) {
        $_SESSION['booking_details'] = [
            'contact' => $_POST['contact'],
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'primary_id' => $_POST['primary_id'],
            'pickup_time' => $_POST['pickup_time'],
            'dropoff_time' => $_POST['dropoff_time'],
            'pickup_location' => $_POST['pickup_location'],
            'return_location' => $_POST['return_location'],
            
        ];
    }
}

header("Location: index.php");
exit();
