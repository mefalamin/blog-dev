
# Laravel's Blog - A blogging site with CMS

Laravel's Blog is a dynamic blog site which is built using [Laravel 5.8](https://laravel.com/)  framework.This project was built my me covering the [udemy](https://www.udemy.com/best-laravel/) course.It will be helpful for those who wants to start learning :beginner: and understand the features of Laravel framework.

## Requirements for running

* [PHP 7](https://www.php.net/)
* [Composer](https://getcomposer.org/)
* [MySQL](https://www.mysql.com/)

## Instructions

#### Windows users:

- Download wamp: http://www.wampserver.com/en/
- Download and extract cmder mini: https://github.com/cmderdev/cmder/releases/download/v1.1.4.1/cmder_mini.zip
- Update windows environment variable path to point to your php install folder (inside wamp installation dir) (here is how you can do this http://stackoverflow.com/questions/17727436/how-to-properly-set-php-environment-variable-to-run-commands-in-git-bash)

cmder will be refered as console


#### Mac Os, Ubuntu and Windows users continue here:

* Create a database locally named 'whatever you want'

* Download composer https://getcomposer.org/download/

* Pull this project using command below
```console
git clone https://github.com/mefalamin/blog-dev
```
* Go to the directory
```console
cd blog-dev
```

* Rename .env.example file to .envinside your project root and fill the database information. (windows wont let you do it, so you have to open your console cd your project root directory and run mv .env.example .env )



* Install packages using composer
```console
composer install
```

* Generate a key for the application
```console
php artisan key:generate
```

* Run the database migration
```console
php artisan migrate
```

* Seed the database
```console
php artisan db:seed
```

* Finally fire up the server
```console
php artisan serve
```

#####You can now access the application at localhost:8000 :thumbsup:

#### Screenshots

<img src="/screenshot/blog.gif" />

### License

The main site  template is for personal use only.If you want to use it commercially please buy and support the developers.The rest of the code used in this application is free :blush:
