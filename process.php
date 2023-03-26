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

// Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $name = $_POST["name"];
  $lastname = $_POST["lastname"];
  $major = $_POST["major"];
  $college = $_POST["college"];
  $age = $_POST["age"];

  // Prepare SQL statement
  $sql = "INSERT INTO students (name, lastname, major, college, age)
          VALUES ('$name', '$lastname', '$major', '$college', '$age')";

  // Execute SQL statement and check for errors
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}


$sql = "SELECT * FROM students";

// Execute SQL statement and check for errors
$result = mysqli_query($conn, $sql);
if (!$result) {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Display form data in HTML table
echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Lastname</th><th>Major</th><th>College</th><th>Age</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["major"] . "</td><td>" . $row["college"] . "</td><td>" . $row["age"] . "</td><td><a href='update.php?id=" . $row["id"] . "'>Update</a> | <a href='delete.php?id=" . $row["id"] . "'>Delete</a></td></tr>";
}
echo "</table>";


// Close database connection
mysqli_close($conn);
?>
