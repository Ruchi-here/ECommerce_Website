<?php

$con=mysqli_connect('localhost:4000','root','','mystore');

if(!$con){
    die(mysqli_error($con));
}
?>



<!-- // $host = 'localhost';
// $username = 'root';
// $password = 'your_password'; // Replace 'your_password' with the actual password
// $database = 'mystore';

// // Create connection
// $conn = mysqli_connect($host, $username, $password, $database);

// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// } -->
