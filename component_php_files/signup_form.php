<?php
$servername = "localhost";
$username = "root";
$password = "Pr0j3ct0"; // will have to change depending on system
$dbname = "peach_airlines"; // will have to change depending on system

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// for Login_id generation
function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}

// Escape user inputs for security
$P_id = rand(1000000000, 9999999999);
$Login_id = getName(16);
$First_name = mysqli_real_escape_string($conn, $_REQUEST['first_name']);
$Last_name = mysqli_real_escape_string($conn, $_REQUEST['last_name']);
$P_name = $First_name . ' ' . $Last_name;
$Login_username = mysqli_real_escape_string($conn, $_REQUEST['email']);
$Login_password = mysqli_real_escape_string($conn, $_REQUEST['password']);
 
// Attempt insert query execution
$sql = "INSERT INTO registered_members (P_id, Login_username, Login_password) VALUES ('$P_id', '$Login_username', '$Login_password')";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql = "INSERT INTO login_details (Login_id, Login_username, Login_password) VALUES ('$Login_id', '$Login_username', '$Login_password')";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($conn);

echo '<html>
        <head>
        <meta http-equiv="refresh" content="2;url=../HTML_Files/main.php" />
        </head>
        <body>';

?>