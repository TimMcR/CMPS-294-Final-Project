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

//Remove a book from the user's cart
function removeBookFromCart(bookId = 0) {
  console.log('Removing book: ', bookId);

//Fetch all of the books in the user's cart
const books = /* fetch books from the user's cart */ [];

//Find the book with the specified bookId
const bookIndex = books.findIndex((book) => book.id === bookId);

//If the book is found, remove it from the array
if (bookIndex !== -1) {
  books.splice(bookIndex, 1);
}
  //Refetch books
  getAllBooksFromCart();
}

//Fetch all of the books in the user's cart
//and add them to a table
function getAllBooksFromCart() {
  //TODO: fetch books
  const books = [
    {
      id: '1',
      title: 'Hunger Games',
      author: 'Suzanne Collins',
      isbn: '12345',
      publisher: 'Scholastic',
      year: '2008',
    },
  ];

  //Clear Table
  const table = document.getElementById('table-body');
  table.innerHTML = '';

  //Add books to table
  books.forEach((book) => {
    const row = table.insertRow();

    row.insertCell(0).innerHTML = book.title;
    row.insertCell(1).innerHTML = book.author;
    row.insertCell(2).innerHTML = book.isbn;
    row.insertCell(3).innerHTML = book.publisher;
    row.insertCell(4).innerHTML = book.year;

    //Delete Button
    row.insertCell(
      5,
    ).innerHTML = `<button class="delete" onClick="removeBookFromCart(${book.id})">Delete</button>`;
  });
}

getAllBooksFromCart();
