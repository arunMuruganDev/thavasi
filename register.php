
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<form action="register.php" method="post" autocomplete="off">

	<h1>REGISTER</h1>
  <input type="text" id="username" name="name" placeholder="Username" required>
	<input type="text" id="regno" name="regno" placeholder="Register No" required>
	<input type="password" id="pass" name="password" placeholder="Password" required>
	<button id="btn">SIGN UP</button>

	<span>Already a member? <a href="login.html">Click Here</a>


</form>

</body>
</html>

<?php 
require_once("db.php");

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the form data
  $username = $_POST['name'];
  $regno = $_POST['regno'];
  $password = $_POST['password'];

  // Hash the password
  //$password = password_hash($password, PASSWORD_DEFAULT);

  // Insert the data into the database
  $sql = "INSERT INTO login (regno, name, password)
  VALUES ('$regno', '$username', '$password')";

  if (mysqli_query($conn, $sql)) {
    echo '<script>
    swal("Good job!", "User Registered Successfully", "success");
    setInterval(function () {
    window.location.assign("login.php")
    }, 3000);
    
    
        </script>';

  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>




