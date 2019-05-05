
# Laravel's Blog - A blogging site with CMS

Laravel's Blog is a dynamic blog site which is built using [Laravel 5.8](https://laravel.com/)  framework.This project was built my me covering the [udemy](https://www.udemy.com/best-laravel/) course.It will be helpful for those who wants to start learning :beginner: and understand the features of Laravel framework.

### Requirements for running

* [PHP 7](https://www.php.net/)
* [Composer](https://getcomposer.org/)
* [MySQL](https://www.mysql.com/)

### Instructions


* Clone this repository
```console
git clone https://github.com/mefalamin/blog-dev
```





* Go to the directory
```console
cd blog-dev
```



* Before running the migration create a database in your mysql server and change the username,password in the .env file in the root of blog-dev folder
```
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

* Run the database migration
```console
php artisan migrate
```



* Seed the database
```console
php artisan db:seed
```



* Finally run the application
```console
php artisan serve
```




### License

The main site  template is for personal use only.If you want to use it commercially please buy and support the developers.The rest of the code of used in this application is free :blush:
