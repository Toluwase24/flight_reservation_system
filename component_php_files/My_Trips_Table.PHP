<?php
$servername = "localhost";
$username = "root";
$password = "Pr0j3ct0";
$dbname = "peach_airlines";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM peach_airlines.flight_details";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    // output data of each row
    print("<tr>");
    print("<th>Origin</th>");
    print("<th>Departure Time</th>");
    print("<th>Arrival Time</th>");
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["Origin"] ."</td><td>". $row["Departure_time"] ."</td><td>". $row["Arrival_time"] ."</td></tr>";
    }
    echo "</table>";
}
else {
    echo "0 results";
}

$conn->close();
?>