<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <style>
    /* Center form on page */
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    form {
      max-width: 500px;
      width: 100%;
      padding: 20px;
      background-color: #f1f1f1;
      border-radius: 10px;
    }
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    input[type="text"], input[type="number"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: none;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
  <script>
    // Validate form inputs
    function validateForm() {
      var name = document.forms["myForm"]["name"].value;
      var lastname = document.forms["myForm"]["lastname"].value;
      var major = document.forms["myForm"]["major"].value;
      var college = document.forms["myForm"]["college"].value;
      var age = document.forms["myForm"]["age"].value;

      if (name == "" || lastname == "" || major == "" || college == "" || age == "") {
        alert("All fields must be filled out");
        return false;
      }
    }
  </script>
  </head>
  <body>
      <form name="myForm" method="POST" action="process.php" onsubmit="return validateForm()">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name"><br><br>

      <label for="lastname">Last Name:</label>
      <input type="text" id="lastname" name="lastname"><br><br>

      <label for="major">Major:</label>
      <input type="text" id="major" name="major"><br><br>

      <label for="college">College:</label>
      <input type="text" id="college" name="college"><br><br>

      <label for="age">Age:</label>
      <input type="text" id="age" name="age"><br><br>

      <input type="submit" value="Submit">



  </body>
</html>
