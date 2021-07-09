## Laravel - Laravel Vuejs Tailwind Surf

- Author: Simon Bashir
- Version: 0.2
- Release Date: Mar 15, 2021 (updated Jul 8, 2021)
- To see a hosted demo you can visit [laravel-vue-tailwind.surf](http://laravel-vue-tailwind.surf)

### Brief Description
Coded with `Laravel v8.32`, Laravel Vuejs Tailwind Surf is a demo project.

### Basic Features
1. This is a "demo" project about books and other resources and the main focus is on learning Laravel, Vuejs, and Tailwind.
2. This demo project shows variety of many techniques for creating API-based projects with Laravel/Vuejs/Tailwind.
3. The "AdminRoleMiddleware" middleware will block authorization to perform CRUD operations on Library Books (the 2nd menu item).
4. Many-to-Many relationship is used between Books and Subjects.
5. Migrations to create schema and DB tables and some "Seeders" are used to prepopulate certain tables. The filesystem configuration file includes a new "book" public disk for storage.
6. "ValidateAndStoreUpload" is used to handle, validate, and store Image upload.
7. Contains many useful concepts: Filters, form validation, scope (in Models), view composer, blade service provider, flash messaging, and helper functions are used in this project.
8. (In the "extra" folder) The additional sql DB files "resources.sql", "books.sql", and "book_subject.sql" contain "real" data gathered from various online resources.  Additionally, book cover images are included in the "book" folder under "extra".
9. Laravel Breeze and Sanctum are used for the back-end and VueJS is used for the front-end.
10. This project is under development and therefore may contain bugs, incomplete features, or broken "responsive" design.

### Screen Shots
Coming soon


### Disclaimer
Laravel Vuejs Tailwind Surf is just for demo purposes. Although it is a work in progress with more features to come, I offer no active support and I do not guarantee the stability of the code so be cautious not to use in any production environment.

### Setup Instructions
```
Laravel Vuejs Tailwind Surf requires Laravel v8.32 (not tested with other versions).
```


* Clone this repository to your local drive
~~~
    git clone https://github.com/halayuba/laravel-vuejs-tailwind-surf.git
~~~
* Install the composer dependencies: go to the folder that contains the download and run this command
~~~
    composer install
~~~
* Create a new database. The example below uses MYSQL (replace the values in [] with your preferences)
~~~
    mysql -u [username] -p [password]
    CREATE DATABASE [db_name];
~~~
* Update .env to your specific needs (replace the values in [] with your preferences)
~~~
    cp .env.example .env
    nano .env
    DB_DATABASE=[db_name]
    DB_USERNAME=[username]
    DB_PASSWORD=[password]
~~~
* Run all migrations to create and populate the database tables
~~~
    php artisan migrate --seed
~~~
* Allow files to be overwritten by giving write permissions as the following
~~~
    sudo chmod -R 777 storage bootstrap/cache
~~~
* Run the following artisan commands
~~~
    npm install && npm run dev
~~~
* Update the values shown in [] below in "baseUrl.js" (in the resources/js/ folder) with your preferences.
~~~
    authApiUrl: 'http://{url}/api/user/auth',
    usersApiUrl: 'http://{url}/api/users',
    resourcesApiUrl: 'http://{url}/api/resources',
    bookApiUrl: 'http://{url}/api/library/books',
    libraryApiUrl: 'http://{url}/api/library',
~~~
* An optional sql files "resources.sql", "books.sql", and "book_subject.sql" are included as seeders.  Also, book cover images are included in the "extra" folder but you will need to move it to be in the root folder storage under app and under the public folder.


### Maintainers & Contributors
- Simon Bashir

### License
The project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
