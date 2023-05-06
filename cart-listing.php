<?php
// Set cookie if it does not exist
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
  <title>My Cart</title>
  <link rel="stylesheet" href="styles.css" />
  <link rel="icon" type="image/x-icon" href="logo.ico">
</head>

<body>
  <div class="container">
    <?php
    // Database variables
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
      $book_isbn = $_GET["ISBN"];

      // Execute query
      $sql = "DELETE FROM Carts WHERE Book_ISBN = $book_isbn LIMIT 1";
      $result = $conn->query($sql);

      // Display banner if successful
      if ($result === TRUE) {
        echo "<div class=\"banner\"><h3> Book Removed From Cart</h3></div>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    ?>
    <div class="logo">
      <img src="logo.png">
      <h3>Exploding Cat Productions</h3>
    </div>
    <div class="nav-bar">
      <h1>Shopping Cart</h1>
      <a href="book-listing.php">Back to Listing</a>
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
            <td></td>
          </tr>
        </thead>
        <?php
        // Execute query
        $sql = "SELECT Title, Author, ISBN, Publisher, Year FROM Carts INNER JOIN Inventory ON Book_ISBN = ISBN
                WHERE User_Cookie = $cookie_value";
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
                  <a class=\"remove\" href=\"cart-listing.php?ISBN=$book_isbn\">Remove From Cart</a>
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