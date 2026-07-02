# Library_CodeIgnighter-
A library webpage to add, read, update, and delete book records 

# Prerequisites
- PHP ( v 7.4+ recommended)
- Composer ( for dependancy management)
- XAMPP or any MySQL sever
- 
# How to Run: 
1. Clone or download the repository
2. Open terminal or command prompt in your project folder and run: composer install
3. Select your XAMPP or MySQL sever location 
4. Open XAMPP Control Panel and select start for MySQL and Apache
5. Create the books table
   1. Open  http://localhost/phpmyadmin in your broswer
   2. Click new in the sidebar
   3. Enter ci4 as the databse name
   4. Click create
   5. Paste the following and hit go :
          CREATE TABLE books (
           id INT AUTO_INCREMENT PRIMARY KEY,
          title VARCHAR(255) NOT NULL,
           author VARCHAR(255) NOT NULL,
           genre VARCHAR(100),
           publication_year INT,
           cover_image VARCHAR(255)
        );
   6. Configure the .env file
      1. Open the file label env and rename it to .env
      2. uncomment these lines and set them as follows:
          - database.default.hostname = localhost
         - database.default.database = ci4
         - database.default.username = root
         - database.default.password =
         - database.default.DBDriver = MySQLi
  7. Start CodeIgniter Sever
     1. In your project folder run: php spark serve
     2. You should ee something like:   CodeIgniter development server started on http://localhost:8080
  8. Page Navigations
     1. Go to http://localhost:8080/book, you will see your list of books or a message if the library is empty
     2. To add a book
         1. Click 'Add Book' button
         2. Fill out the form and hit Save, your book will appear on the home page
     3. To Edit a Book
         1. Click the 'Edit' button next to any book
         2. Make your changes and then hit the 'Update' button to save your changes
    4. To Delete a Book
         1. On the home page hit the 'Delete' button next to a book in the Actions column and click confirm.
       
# Page Navigations Example 
- Books List
http://localhost:8080/books


- Add Book
http://localhost:8080/bookcontroller/create_book


- Edit Book
http://localhost:8080/bookcontroller/edit_book/1


- Delete Book
On books list, click Delete

     


          

                   
                                                        
      
