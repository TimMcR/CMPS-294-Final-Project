<?php
//Set cookie if it does not exist
$cookie_name = "userCookie";
$cookie_value = ceil(time() % 1000000);

if (!isset($_COOKIE[$cookie_name])) {
  setcookie($cookie_name, $cookie_value);
} else {
  $cookie_value = $_COOKIE[$cookie_name];
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>Home Page</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <div class="container">
    <?php
    //Database variables
    $servername = "localhost";
    $username = "id20669844_294termproject";
    $password = "[*5GJhmoT&4n(+uH";
    $dbname = "id20669844_committedlamp";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET["ISBN"])) {
      // Execute query
      $id = ceil(time() % 1000000);
      $book_isbn = $_GET["ISBN"];
      $sql = "INSERT INTO `Carts` (`Id`, `User_Cookie`, `Book_ISBN`) VALUES ('$id', '$cookie_value', '$book_isbn');";
      $result = $conn->query($sql);

      if ($result === TRUE) {
        echo "<div class=\"banner\"><h3>Book added to cart successfully!</h3></div>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    ?>
    <div class="nav-bar">
      <h1>Book Listing</h1>
      <a href="cart-listing.php">My Cart</a>
    </div>
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Publisher</th>
            <th>Year</th>
            <th></th>
          </tr>
        </thead>
        <?php
        // Execute query
        $sql = "SELECT Title, Author, ISBN, Publisher, Year FROM Inventory";
        $result = $conn->query($sql);

        //Print the output data of each row
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
          $book_isbn = "";

          echo "<tr>";
          foreach ($row as $key => $value) {
            if ($key === "ISBN") {
              $book_isbn = $value;
            }

            echo "<td>$value</td>";
          }

          echo "<td>
           <a class=\"add\" href=\"book-listing.php?ISBN=$book_isbn\"> Add to Cart  </a>
          </td>";
          echo "</tr>";
        }

        echo "</tbody>";

        // Close connection
        $conn->close();
        ?>
      </table>
    </div>
  </div>
</body>

</html>