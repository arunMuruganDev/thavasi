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

<form action="login.php" method="post" autocomplete="off"> 

	<h1>LOGIN</h1>
	<input type="text" id="regno" name="regno" placeholder="Register No" required>
	<input type="password" id="pass" name="password" placeholder="Password" required>
	<button id="btn">SIGN IN</button>

	<span>Forgot password? <a href="reset.html">Click Here</a>


</form>

</body>
</html>




<?php

require_once("db.php");

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $regno = $_POST['regno'];
    $password = $_POST['password'];

    // Get the hashed password from the database
    $sql = "SELECT password FROM login WHERE regno = '$regno'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $db_password = $row['password'];

  
    // Check if the entered password matches the hashed password
    /*
    if (password_verify($password, $hashed_password)) {
        // Log the user in
        session_start();
        $_SESSION['regno'] = $regno;
        //header('Location: dashboard.php');
        echo "<script>alert('Login Successful!')</script>";
        exit;
    } else {
        // Show an error message
        echo "Incorrect Regno or password";
    } 
    */
    if($password===$db_password)
    {
        echo '<script>swal("Good job!", "Login Successful!", "success");
        setInterval(function () {
            window.location.assign("index.php")
            }, 3000);
        </script>';
       
    }
    else{

        echo '<script>swal("OOPS!", "Username or Password is incorrect!", "error");
        </script>';
    
    }

    mysqli_close($conn);
}
?>

