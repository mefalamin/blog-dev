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

Route::get('/test',function(){

    /*$user = App\User::find(1);
    dd($user->profile->avatar);*/
    // return App\Profile::find(1)->user;


});

/*front end routers*/

Route::get('/',
    [
        'uses' => 'FrontEndController@index',
        'as' => 'index'
    ]
);

Route::get('/posts/{slug}',[

    'uses' => 'FrontEndController@singlePost',
    'as'  => 'post.single'

]);

Route::get('/category/{id}',[

    'uses' => 'FrontEndController@category',
    'as' => 'category.single'
]);

Route::get('/tag/{id}',[

    'uses' => 'FrontEndController@tag',
    'as'  => 'tag.single'


]);

//search route
Route::get('/results',function (){

    $posts = \App\Post::where('title' , 'like', '%' . request('query') . '%')->get();

        return view('results')

            ->with('posts', $posts)
            ->with('title', 'Search results : ' . request('query'))
            ->with('categories', \App\Category::all()->take(5))
            ->with('settings', \App\Setting::first())
            ->with('query', request('query'))

            ;

});


//subscribe route

Route::post('/subscribe',function () {

   // dd(request('email'));
    $email = request('email');

    Newsletter::subscribe($email);

    Session::flash('success','Subscribed Successfully');
    return redirect()->back();

});


Auth::routes();



Route::group(['prefix' => 'admin','middleware' => 'auth'],function (){

    Route::get('/dashboard',[

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


    /*tag router start*/

    Route::get('/tags',[

        'uses' => 'TagsController@index',
        'as' => 'tags'
    ]);

    Route::get('/tags/create',[

        'uses' => 'TagsController@create',
        'as' => 'tag.create'
    ]);

    Route::post('/tag/store',[

        'uses' => 'TagsController@store',
        'as' => 'tag.store'
    ]);


    Route::get('/tag/edit/{id}',[

        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'
    ]);

    Route::post('/tag/updates/{id}',[

        'uses' => 'TagsController@update',
        'as' => 'tag.update'
    ]);

    Route::get('/tag/delete/{id}',[

        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'
    ]);


    /*tag router end*/

    /*user router start*/

    Route::get('/users',[

        'uses' => 'UsersController@index',
        'as' => 'users'

    ]);

    Route::get('/user/create',[

        'uses' => 'UsersController@create',
        'as' => 'user.create'

    ]);

    Route::post('/user/store',[

        'uses' => 'UsersController@store',
        'as' => 'user.store'

    ]);

    Route::get('/user/admin/{id}',[

        'uses' => 'UsersController@admin',
        'as' => 'user.admin'

    ]);


    Route::get('/user/not-admin/{id}',[

        'uses' => 'UsersController@not_admin',
        'as' => 'user.not.admin'

    ]);

    Route::get('/user/delete/{id}',[

        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'

    ]);

    /*user router end*/

    /*user profile router start*/

    Route::get('/user/profile',[

        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'

    ]);

    Route::post('/user/profile/update',[

        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'

    ]);


    /*user profile router end*/


    Route::get('/settings',[

        'uses' => 'SettingsController@index',
        'as' => 'settings'

    ]);

    Route::post('/settings/update',[

        'uses' => 'SettingsController@update',
        'as' => 'settings.update'

    ]);

});


