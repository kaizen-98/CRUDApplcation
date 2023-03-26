
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

  $sql = "SELECT * FROM students WHERE id='$id'";

  // Execute SQL statement and check for errors
  $result = mysqli_query($conn, $sql);
  if (!$result) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  } else {
    $row = mysqli_fetch_assoc($result);
    $name = $row["name"];
    $lastname = $row["lastname"];
    $major = $row["major"];
    $college = $row["college"];
    $age = $row["age"];

    echo "<form action='update.php?id=$id' method='post'>";
    echo "<input type='hidden' name='id' value='$id'>";
    echo "Name: <input type='text' name='name' value='$name'><br>";
    echo "Lastname: <input type='text' name='lastname' value='$lastname'><br>";
    echo "Major: <input type='text' name='major' value='$major'><br>";
    echo "College: <input type='text' name='college' value='$college'><br>";
    echo "Age: <input type='text' name='age' value='$age'><br>";
    echo "<input type='submit' value='Update'>";
    echo "</form>";

  }
} else {
  echo "No record found.";
}

// Check if form data has been submitted for updating
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];
  $name = $_POST["name"];
  $lastname = $_POST["lastname"];
  $major = $_POST["major"];
  $college = $_POST["college"];
  $age = $_POST["age"];

  // Update SQL statement to filter by ID
  $sql = "UPDATE students SET name='$name', lastname='$lastname', major='$major', college='$college', age='$age' WHERE id='$id'";
  if (mysqli_query($conn, $sql)) {
    echo "Form data updated successfully!";
  
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Close database connection
mysqli_close($conn);
?>

<style>
   form {
     margin: 20px;
     padding: 20px;
     border: 1px solid #ccc;
     border-radius: 5px;
   }
   label {
     display: block;
     margin-bottom: 10px;
     font-weight: bold;
   }
   input[type=text] {
     width: 100%;
     padding: 5px;
     margin-bottom: 20px;
     border-radius: 3px;
     border: 1px solid #ccc;
   }
   input[type=submit] {
     background-color: #4CAF50;
     color: white;
     padding: 8px 16px;
     border: none;
     border-radius: 5px;
     cursor: pointer;
   }
   input[type=submit]:hover {
     background-color: #3e8e41;
   }
 </style>
