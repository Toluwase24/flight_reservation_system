<?php
$servername = "localhost";
$username = "root";
$password = "Pr0j3ct0"; // will have to change depending on system
$dbname = "peach_airlines"; // will have to change depending on system

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>