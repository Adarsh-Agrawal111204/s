<?php
// Define database connection parameters
$servername = "localhost"; // Your database server (usually localhost)
$username = "root";        // Your MySQL username (default is usually 'root')
$password = "";            // Your MySQL password (default is usually empty)
$dbname = "library";       // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If connection is successful, we can use the $conn object to perform queries
// echo "Connected successfully";
?>
