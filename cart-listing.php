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
  <title>My Cart</title>
  <link rel="stylesheet" href="styles.css" />
  <script>
    function deleteFromCart(isbn){
      //make request from database
      //Remove table row
      //update cart

    }
  <script/>
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

         // Delete book from cart if remove button is clicked
         if (isset($_POST['remove'])) {
          $book_isbn = $_POST['isbn'];

          $sql = "DELETE FROM Carts WHERE User_Cookie = $cookie_value AND Book_ISBN = $book_isbn";
          $result = $conn->query($sql);
        }

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

          // remove from cart functionality
          echo "<td>
                  <form method=\"post\">
                    <input type=\"hidden\" name=\"isbn\" value=\"$book_isbn\">
                    <input type=\"hidden\" name=\"cookie\" value=\"$cookie_value\">
                    <button class=\"delete\" onClick=\"deleteFromCart(<?php echo $book_isbn; ?>)\">Remove from Cart</button>
                  </form>
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