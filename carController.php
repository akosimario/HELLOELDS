<?php
if(!session_start()){
    session_start();
}
require_once 'carModel.php';


class BookingController extends CarModel {
    
    public function insertData() {
        if (!isset($_SESSION['vehicle']['vehicle_id'])) {
            die("Error: No vehicle ID found in session.");
        }
        
        $vehicleId = $_SESSION['vehicle']['vehicle_id'];
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['booking_details'])) {
            $bookingInfo = $_SESSION['booking_details'];
            $pic_ID = $_FILES['pic_ID'];
            $proof_payment = $_FILES['proof_payment'];

            if ($pic_ID['error'] == 0 && $proof_payment['error'] == 0) {
                $targetDir = 'images';

                $allowedImageTypes = ['jpg', 'gif', 'png', 'pdf']; 
                $pic_ID_ext = strtolower(pathinfo($pic_ID['name'], PATHINFO_EXTENSION));
                $proof_payment_ext = strtolower(pathinfo($proof_payment['name'], PATHINFO_EXTENSION));

            if (!in_array($pic_ID_ext, $allowedImageTypes) || !in_array($proof_payment_ext, $allowedImageTypes)) {
                echo "Only jpg, gif, png, pdf are allowed!";
                    return;
                }
                // way to insert on the directory
                $pic_ID_name = basename($pic_ID['name']);
                $pic_ID_path = $targetDir . $pic_ID_name;
                move_uploaded_file($pic_ID['tmp_name'], $pic_ID_path);

                $proof_payment_name = basename($proof_payment['name']);
                $proof_payment_path = $targetDir . $proof_payment_name;
                move_uploaded_file($proof_payment['tmp_name'], $proof_payment_path);

                $result = $this->insertDB(
                    $bookingInfo['contact'], $bookingInfo['first_name'], $bookingInfo['last_name'], $bookingInfo['primary_id'], $bookingInfo['pickup_time'], $bookingInfo['dropoff_time'], $bookingInfo['pickup_location'], 
                    $bookingInfo['return_location'],  $pic_ID_path, $proof_payment_path,  $vehicleId
                );  

                // Check the result 
            if ($result > 0) {
                echo "Booking successful";
                unset($_SESSION['booking_details']);
                header("Location: http://localhost/testingSystem/bookCar.php");
                
                exit();
            } else {
                 echo "Failed to book";
            }
            } else {
                echo "Error uploading files!";
            }
        } else {
            echo "Booking details are missing!";
        }
    }
}
$controller = new BookingController() ;
$controller->insertData();

