<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::group(['prefix' => 'admin','middleware' => 'auth'],function (){

    Route::get('/home',[

        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    //post related mapping form router start

    Route::get('/post/create',[

        'uses' => 'PostsController@create',

        'as' => 'post.create'
    ]);

    Route::post('/post/store',[

        'uses' => 'PostsController@store',

        'as' => 'post.store'
    ]);

    Route::get('/posts',[

        'uses' => 'PostsController@index',

        'as' => 'posts'
    ]);

    Route::get('/posts/edit/{id}',[

        'uses' => 'PostsController@edit',

        'as' => 'post.edit'
    ]);

    Route::post('/posts/update/{id}',[

        'uses' => 'PostsController@update',

        'as' => 'post.update'
    ]);

    Route::get('/post/delete/{id}',[

        'uses' => 'PostsController@destroy',

        'as' => 'post.delete'
    ]);

    //trashed post router
    Route::get('/posts/trashed',[

        'uses' => 'PostsController@trashed',

        'as' => 'post.trashed'
    ]);

    Route::get('/posts/kill/{id}',[

        'uses' => 'PostsController@kill',

        'as' => 'post.kill'
    ]);

    Route::get('/posts/restore/{id}',[

        'uses' => 'PostsController@restore',

        'as' => 'post.restore'
    ]);

    //post related mapping form router send


    //category create form router start

    Route::get('/category/create',[

        'uses' => 'CategoriesController@create',

        'as' => 'category.create'
    ]);

    Route::post('/category/store',[

        'uses' => 'CategoriesController@store',

        'as' => 'category.store'
    ]);

    Route::get('/categories',[

        'uses' => 'CategoriesController@index',

        'as' => 'categories'
    ]);

    Route::get('/category/edit/{id}',[

        'uses' => 'CategoriesController@edit',

        'as' => 'category.edit'
    ]);

    Route::get('/category/delete/{id}',[

        'uses' => 'CategoriesController@destroy',

        'as' => 'category.delete'
    ]);

    Route::post('/category/update/{id}',[

        'uses' => 'CategoriesController@update',

        'as' => 'category.update'
    ]);
    //category  router end
});


