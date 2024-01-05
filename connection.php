<?php
$servername = "localhost"; // Replace with your MySQL server hostname (usually 'localhost')
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "bhai"; // Replace with the name of your MySQL database ('bhai' in this case)

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
?>
