<?php
//Database variables
$servername = "localhost";
$username = "id20669844_294termproject";
$password = "[*5GJhmoT&4n(+uH";
$dbname = "id20669844_committedlamp";
$table = "Carts";


 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 } 

 // Execute Query
 $sql = "DELETE FROM $table WHERE title='$title' && author='$author' 
 && ISBN='$ISBN' && publisher='$publisher' && year='$year'";

if ($conn->query($sql) === TRUE) {
    echo "Cart deleted successfully!"."<br>";
    } else {
    echo "Error deleting cart: " . $conn->error;
    }
//...
?>