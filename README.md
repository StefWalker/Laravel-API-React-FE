# Laravel-API-React-FE

## Challenge three - Laravel API

Laravel API for a book table, focused in main CRUD functions.
- Requirements
- Set up
- Postman
- Execute
- Data Output

Main funtionality of the API is to have the option to create, update, delete and select data from and to a database with a Book and Author table.

### Requirements
Requirements to execute the API
> - Install XAMPP
> - Version utilized in this case (8.1.6 for Windows)
>> Dowload link:
>> https://www.apachefriends.org/es/index.html
> - Install Postman
>> Dowload link:
>> https://www.postman.com/downloads/
> - Install Visual Code, No extension needed
>> Dowload link:
>> https://code.visualstudio.com/

> - Install Composer for Windows
>> https://getcomposer.org/doc/00-intro.md#installation-windows

### Execute / Set up
First step will be installing XAMPP on the installation we only need the next components:
 - Apache, MySQL, PHP, phpMyAdmin
 - Continue the steps with the suggested paths
 - After the installation is completed we can execute the app and Start the Apache and MySQL Modules
 - Last Step will be to add c:\xampp\php to the enviroment variables in the OS.

For MySQL we will need to create a new DataBase in phpMyAdmin using the next link: http://localhost/phpmyadmin/index.php .
This Database will be named books.
After Visual Studio Code is installed and the proyect is loaded in VS, open two terminals and execute the next commands: 
```
php artisan serve
php artisan migrate
```
### Postman
We can import our request collection into postman using the file provided, this one will allow us to perform the CRUD request to the API and the Database running.
File Name: *Laravel-API-React-FE/BooksChallenge.postman_collection.json*

This file will completely set up the enviroment for us and allow us to start.

### Data Output
The data output will be present in the Postman application, each request will return the data requested, created or updated to verify the right execution of this data, when data is deleted a response 204 will be shown.
The list and full request of a table will be requested paginated.


### Usage
If all the steps where done correctly, to start using the application we only need to execute the next code on a VS terminal or in the proyect main folder.
```
php artisan serve
```

### Tests
```
Postman Requests

# Creation
Create Author and Create Book (data is customizable in the body tab)

# Request / Update
All request that stars with GET will be returnin the data requested, this one beign filtered or paginated
```
