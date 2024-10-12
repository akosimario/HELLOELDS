<?php
require_once 'connection.php';
$db = new practicedb();
$conn = $db->connect();

if (isset($_POST['bookingID']) && isset($_POST['status'])) {
    $bookingID = $_POST['bookingID'];
    $status = $_POST['status'];

    $updateQuery = "UPDATE bookings SET status = ? WHERE bookingID = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("si", $status, $bookingID);
    $stmt->execute();

    
    if ($status == 'confirmed') {
        $vehicleIDQuery = "SELECT vehicle_id FROM bookings WHERE bookingID = ?";
        $stmt = $conn->prepare($vehicleIDQuery);
        $stmt->bind_param("i", $bookingID);
        $stmt->execute();
        $result = $stmt->get_result();
        $vehicle = $result->fetch_assoc();

        $updateVehicleQuery = "UPDATE vehicles SET status = 'unavailable' WHERE id = ?";
        $stmt = $conn->prepare($updateVehicleQuery);
        $stmt->bind_param("i", $vehicle['vehicle_id']);
       $stmt->execute();
    }
    
    header("Location: adminPanel.php"); 
    exit();
}

?>
