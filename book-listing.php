<?php
//Set cookie if it does not exist
$cookie_name = "userCookie";
$cookie_value = time();

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
    <!-- A banner just to display during testing. Remove before submission -->
    <div class="test-info">
      <h3>
        <?php
        echo "Cookie value: $cookie_value"
          ?>
      </h3>
    </div>
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
        //Database variables
        $servername = "localhost";
        $username = "id20541453_itsakbooks";
        $password = "aqm#k89ti0/dQ&(1";
        $dbname = "id20541453_booksbyautumn";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

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

          // TODO: add to cart functionality
          echo "<td>
            <button class=\"add\" onClick=\"\">Add to Cart</button>
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