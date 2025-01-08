<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate inputs
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $age = intval($_POST['age']);
    $gender = trim($_POST['gender']);
    $address = trim($_POST['address']);

    if (!$email || !$name || !$phone || !$age || !$gender || !$address) {
        die("Invalid input. Please fill out all fields correctly.");
    }

    // Prepare update query
    $sql = "UPDATE users SET name = ?, phone = ?, age = ?, gender = ?, address = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssisss", $name, $phone, $age, $gender, $address, $email);

    if ($stmt->execute()) {
        echo "User updated successfully.";
    } else {
        echo "Error updating user: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
