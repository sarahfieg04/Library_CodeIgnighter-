# Library_CodeIgnighter-
A library webpage to add, read, update, and delete book records 

# Prerequisites
- PHP ( v 7.4+ recommended)
- Composer ( for dependancy management)
- XAMPP or any MySQL sever
- 
# How to Run: 
1. Download and Install Codeigniter 4 
   1. Download from: https://codeigniter.com/download or from composer: composer create-project codeigniter4/appstarter library_codeigniter
   2. This will create a new fold with your CodeIgniter setup
   3. Copy the provided files
         - app/Database/Migrations/CreateBookRecords.php
         - app/Controllers/BookController.php
         - app/Models/BookModel.php
         - app/Views/books/Form.php
         - app/Views/books/List.php
      
2. Open terminal or command prompt in your project folder and run: composer install
   
4. Select your XAMPP or MySQL sever location
   
6. Open XAMPP Control Panel and select start for MySQL and Apache
   
7. Create the books table
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
      
  8. Configure the .env file
      1. Open the file label env and rename it to .env
      2. uncomment these lines and set them as follows:
         - database.default.hostname = localhost
         - database.default.database = ci4
         - database.default.username = root
         - database.default.password =
         - database.default.DBDriver = MySQLi
           
  9. Start CodeIgniter Sever
     1. In your project folder run: php spark serve
     2. You should ee something like:   CodeIgniter development server started on http://localhost:8080
        
  10. Page Navigations
     1. Go to http://localhost:8080/book, you will see your list of books or a message if the library is empty
      
   11. How to use
       1. To add a book
         - Click 'Add Book' button
         - Fill out the form and hit Save, your book will appear on the home page
     2. To Edit a Book
         - Click the 'Edit' button next to any book
         - Make your changes and then hit the 'Update' button to save your changes
    3. To Delete a Book
         -  On the home page hit the 'Delete' button next to a book in the Actions column and click confirm.

       
# Page Navigations Example 
- Books List
http://localhost:8080/books


- Add Book
http://localhost:8080/bookcontroller/create_book


- Edit Book
http://localhost:8080/bookcontroller/edit_book/1


- Delete Book
On books list, click Delete

     


          

                   
                                                        
      
