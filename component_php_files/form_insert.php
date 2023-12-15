<?php
$servername = "localhost";
$username = "root";
$password = "Pr0j3ct0"; // will have to change depending on system
$dbname = "peach_airlines"; // will have to change depending on system

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security
$P_id = rand(1000000000, 9999999999);
$P_name = mysqli_real_escape_string($conn, $_REQUEST['full_name']);
$Phone_number = mysqli_real_escape_string($conn, $_REQUEST['phone_number']);
 
// Attempt insert query execution
$sql = "INSERT INTO ticket_reservation (P_id, Re_Type, Re_date, P_name, P_mobile) VALUES ('$P_id', 'unregistered', '2023-01-01 23:00:00', '$P_name', '$Phone_number')";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($conn);

echo '<html>
        <head>
        <meta http-equiv="refresh" content="2;url=../HTML_Files/main.html" />
        </head>
        <body>';

?>