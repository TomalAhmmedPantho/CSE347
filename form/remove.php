<?php
include 'conn.php';  


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];  

   
    if (is_numeric($id)) {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $message = "User with ID " . $id . " has been removed successfully.";
            } else {
                $message = "No user found with ID " . $id . ".";
            }
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $message = "Invalid ID provided.";
    }
} else {
    $message = "No ID provided. Please provide a valid user ID.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove User</title>
</head>
<body>
    <h1>Remove User</h1>

    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>

    <form action="" method="POST">
        <label for="id">Enter User ID to Remove:</label>
        <input type="text" id="id" name="id" required>
        <button type="submit">Remove User</button>
    </form>

</body>
</html>
