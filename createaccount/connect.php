<?php
$servername = "pvnet.cq9diskz8wwp.us-west-1.rds.amazonaws.com";
$username = "pvnetuser";
$password = "CDy21xM8c9NA";
$database= "pvnetclasses";
$table_classes = 'classesDev';
$table_customer = 'customer';

// Create connection
$mysqli = new mysqli($servername, $username, $password, $database);

// debugger

// if ($mysqli->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 
// if ($mysqli->connect_errno) {
//     echo "Sorry, this website is experiencing problems.";
//     echo "Error: Failed to make a MySQL connection, here is why: \n";
//     echo "Errno: " . $mysqli->connect_errno . "\n";
//     echo "Error: " . $mysqli->connect_error . "\n";
//     exit;
// }
?>