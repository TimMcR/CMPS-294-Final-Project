//Connect to Database

//Check if a cookie exists or create it

//Remove a book from the user's cart
function removeBookFromCart(bookId = 0) {
  console.log('Removing book: ', bookId);

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
    ).innerHTML = `<button onClick="removeBookFromCart(${book.id})">Delete</button>`;
  });
}

getAllBooksFromCart();
