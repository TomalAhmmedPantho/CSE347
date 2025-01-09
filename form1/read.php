<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Data</title>
</head>
<body>
	<?php
		include 'conn.php';

		
		$sql = "SELECT * FROM users";
		$result = $conn->query($sql);

		
		if ($result->num_rows > 0) {
			
			echo "<table border='1'>";
			echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Gender</th><th>Address</th></tr>"; 

			
			while ($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>" . $row["id"] . "</td>
					<td>" . $row["name"] . "</td>
					<td>" . $row["email"] . "</td>
					<td>" . $row["phone"] . "</td>
					<td>" . $row["gender"] . "</td>
					<td>" . $row["address"] . "</td>
				</tr>";
			}

			
			echo "</table>";
		} else {
			echo "No results found.";
		}

		$conn->close();
	?>
</body>
</html>
