<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['vehicle_name']) && isset($_POST['vehicle_id'])) { 
        $_SESSION['vehicle'] = [
            'vehicle_name' => $_POST['vehicle_name'],
            'vehicle_id' => $_POST['vehicle_id'], 
        ];

        header('Location: bookingDetails.php');
        exit();
    } else {
        echo "Error: Car details not found.";
        exit();
    }
}
