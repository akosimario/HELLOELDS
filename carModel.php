<?php
require_once "connection.php";

class CarModel extends practicedb {
    protected function insertDB( $email, $first_name, $last_name, $primary_id, $pick_up_time, $dropoff_time, $pickup_location, $dropoff_location, $pic_ID, $proof_payment,$vehicle_id) {

        $sql = "INSERT INTO bookings (email, first_name, last_name, primary_id, pick_up_time, dropoff_time, pickup_location, dropoff_location, pic_ID, proof_payment,vehicle_id )
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssssssi",  $email, $first_name, $last_name, $primary_id, $pick_up_time, $dropoff_time, $pickup_location, $dropoff_location, $pic_ID, $proof_payment,$vehicle_id);
    
        if ($stmt->execute()) {
            return $stmt->affected_rows;
        } else {
            echo "Error: " . $stmt->error;
            return 0;
        }
    }
    
    public function addVehicle($brand, $name, $capacity, $transmission, $color, $year_model, $availability, $carImage,$price) {
        $stmt = $this->conn->prepare("INSERT INTO vehicles (brand, vehicle_name, seating_capacity, transmission, color, year_model, status, carImage,price) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param("sssssssbi", $brand, $name, $capacity, $transmission, $color, $year_model, $availability, $carImage,$price);
        $stmt->send_long_data(7, $carImage);
            
        if ($stmt->execute()) {
            return true;  
        } else {
            echo "Error: " . $stmt->error;  
            return false;
        }
    }
    public function getVehicle() {
    $query = "SELECT * FROM vehicles WHERE status = 'available'";
    return $this->conn->query($query);
}

        public function getAllBookings() {
        $query = "SELECT * FROM bookings";
        return $this->conn->query($query);
}
}
?>
