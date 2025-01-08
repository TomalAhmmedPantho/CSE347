<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

 
    $sql = "INSERT INTO users (name, email, phone, age, gender, address) 
            VALUES ('$name', '$email', '$phone', '$age', '$gender', '$address')";

   
    if ($conn->query($sql)) {     
        header("Location: index.html");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}
?>

