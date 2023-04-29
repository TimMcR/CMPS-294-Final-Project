// Check if a cookie exists or create it
var userCookie = '';

const cookie = document.cookie.match('(^|;)\\s*userCookie\\s*=\\s*([^;]+)');
if (cookie) {
  // If the cookie exists, set the value of the outside variable to the cookie value
  userCookie = cookie[2];
} else {
  // If the cookie doesn't exist, create it with a value of "test"
  const date = new Date();
  const cookieValue = Number(date);

  // Set cookie expiry to 7 days from now
  date.setTime(date.getTime() + 7 * 24 * 60 * 60 * 1000);
  document.cookie = `userCookie=${cookieValue}; expires=${date.toGMTString()}; path=/`;

  userCookie = cookieValue;
}

// Add a book to the user's cart
function addBookToCart(ISBN = '') {
  // Connect to the php file that adds the book to the user's cart
  const xmlhttp = new XMLHttpRequest();
  const url = `add-book-to-cart.php?ISBN=${ISBN}&Cookie=${userCookie}`;

  // Add the book to the user's cart
  xmlhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      const response = JSON.parse(this.responseText);

      console.log('Response: ', response);
    }
  };

  xmlhttp.open('GET', url, true);
  xmlhttp.send();
}

// Write all books to table
function addBooksToTable(
  books = [{ Title: '', Author: '', ISBN: '', Publisher: '', Year: '' }],
) {
  // Clear Table
  const table = document.getElementById('table-body');
  table.innerHTML = '';

  // Write books to table
  books.forEach((book) => {
    const row = table.insertRow();

    row.insertCell(0).innerHTML = book.Title;
    row.insertCell(1).innerHTML = book.Author;
    row.insertCell(2).innerHTML = book.ISBN;
    row.insertCell(3).innerHTML = book.Publisher;
    row.insertCell(4).innerHTML = book.Year;

    // Add to cart button
    row.insertCell(
      5,
    ).innerHTML = `<button class="add" onClick="addBookToCart(${book.ISBN})">Add to Cart</button>`;
  });
}

function fetchAllBooks() {
  // Connect to the php file that queries the database
  const xmlhttp = new XMLHttpRequest();
  const url = 'fetch-all-books.php';

  xmlhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      const books = JSON.parse(this.responseText);

      if (!books || !(books instanceof Array)) {
        return;
      }

      addBooksToTable(books);
    }
  };

  xmlhttp.open('GET', url, true);
  xmlhttp.send();
}

//fetchAllBooks();
