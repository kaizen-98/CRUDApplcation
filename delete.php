<?php
// Define database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// Check if ID parameter exists in URL
if (isset($_GET["id"])) {
  $id = $_GET["id"];

  // Prepare SQL statement to delete form data by ID
  $sql = "DELETE FROM students WHERE id = '$id'";

  // Execute SQL statement and check for errors
  if (mysqli_query($conn, $sql)) {
  echo "<script>alert('Record deleted successfully!');</script>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Close database connection
mysqli_close($conn);
?>


<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f0f0f0;
		}
		h1 {
			color: #333333;
			text-align: center;
			margin-top: 50px;
		}
		p {
			color: #555555;
			text-align: center;
			font-size: 20px;
			margin-top: 30px;
		}
		a {
			display: block;
			margin: 30px auto 0;
			width: 150px;
			height: 40px;
			background-color: #007bff;
			color: #ffffff;
			text-align: center;
			line-height: 40px;
			text-decoration: none;
			border-radius: 5px;
			font-size: 16px;
		}
		a:hover {
			background-color: #0069d9;
		}
	</style>
