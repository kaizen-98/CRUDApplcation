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
    echo "Record deleted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Close database connection
mysqli_close($conn);
?>
