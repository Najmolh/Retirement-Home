<?php
$servername = "localhost";
$username = "najmol";
$password = "ninja12345";
$dbname = "retirement_home";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
