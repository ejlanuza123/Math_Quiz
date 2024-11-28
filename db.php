<?php
$servername = "localhost";
$username = "root";  // Use your MySQL username
$password = "lanuza";      // Use your MySQL password
$dbname = "mathquiz";  // Database name
$port = "3307";  // Corrected semicolon here

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
