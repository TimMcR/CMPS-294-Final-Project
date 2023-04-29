<?php
//Database variables
$servername = "localhost";
$username = "id20669844_294termproject";
$password = "[*5GJhmoT&4n(+uH";
$dbname = "id20669844_committedlamp";
$table = "Inventory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Execute query
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

// Convert result to JSON and output
$rows = array();
while ($r = mysqli_fetch_assoc($result)) {
  $rows[] = $r;
}
echo json_encode($rows);

// Close connection
$conn->close();
?>