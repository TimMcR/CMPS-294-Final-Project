# CMPS-294-Final-Project

## Term Project Instructions/Description

Use MySQL database created for the Books assignments and allow a user to add/delete books to/from a "cart".

#

You can use the books database which you created for your MySQL database and populate it with some books from the PhpMyAdmin panel. Then, write new scripts to perform the following functions (each of which may be done with separate scripts):

## Ramsey

Display the books with add-to-cart buttons: Show to a user can call this script with a browser, and the script generates a listing of the books in the database. Next to each book there should be an "add to cart" button. Upon visiting this script with a browser, the user gets a unique cookie (identifying the user) if one does not already exist from a previous visit. The job of this script is to check and create a cookie (if needed), read the database, and present the results with an add to cart button next to it. The cookie will be used as the user's cart-ID in the following. Somewhere on the listing page there should be a link/button which should produce a new page with the contents of the user's cart. The user's cart at all times is identified by a unique cookie as explained above.

## Chase

Adding to cart: When clicking on an "add to cart" button, the book is added to the user's cart and then the script displays the contents of the user's cart, each with a delete button next to it. Bellow that cart list, the script should display a link to send the user to the first script that displays the books database for further additions. To support this function as well as the next one below, you will need a new "carts" table in the database which must have a column for the user cart-ID followed by a second column which contains the ISBN of the added book. If a user has 3 books in the cart, the table should have 3 entries, each with that user's ID and the corresponding book(s). You have the option to either have user-ID followed by all the fields of the book, or user-ID followed by just the ISBN. The first is the easiest because getting the cart's contents only requires searching by user-ID. The second is the way it is really done because updates in the books database carry to the carts seamlessly but displaying the cart contents requires one more level where the ISBN is used to retrieve the book details from the original books table. But for our purposes you can do either (choice up to you).

## Autumn

Deleting from cart: When displaying the cart, a "delete" button next to each cart entry should be used to delete that item from the cart (i.e. from the carts table of the database). Upon deletion the new cart contents should be displayed for further deletions. At the end of the cart there should always be a link pointing to the first script for browsing and adding more items to the cart.

#

All the management of the contents of the books table will be done via PhpMyAdmin. However, the user should be able to add and delete books from the cart by using the browser as explained in the three parts above.

This project can accommodate 3 students, one for each part. Each part can be developed independently of the others so that failure of one part should not affect the others, but they should work together in an integrated way. For example, you can initially use a hidden field with a preset/fixed cart-ID so that the list, add, and delete operations can be worked on independently from each other. You may work on a replicated database at first or on a common database, but the integrated product obviously will have to use a common database.

## Requirements for grading

- Correct creation of a (perpetual) cookie for cart-ID
- Correct display of the books list and creation of a cart-ID cookie
- Correct implementation of the add and delete functions of the cart
- Correct display of the cart contents after operations
- Integration of the 3 parts.

#

Each student gets 80% of the grade for correctly implementing the tasks of his/her part and 20% for a working integration.
