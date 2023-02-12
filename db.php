<?php
$servername = "sql10.freesqldatabase.com";
$username = "sql10597656";
$password = "EvXCHFFMbp";
$dbname = "sql10597656";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
