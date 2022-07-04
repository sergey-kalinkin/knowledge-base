<?php

Route::group(['namespace' => 'Auth'], function () {

    Route::group(['middleware' => ['guest']], function (){
        Route::get('/login', 'FollowerLoginController@showLoginForm')->name('login');
        Route::post('/login', 'FollowerLoginController@login');
    });

    Route::group(['middleware' => ['guest:admin']], function (){
        Route::get('/admin/login', 'AdminLoginController@showLoginForm')->name('admin_login');
        Route::post('/admin/login', 'AdminLoginController@login');
    });

    Route::group(['middleware' => ['auth']], function() {
        Route::post('/logout', 'FollowerLoginController@logout')->name('logout');
    });

    Route::group(['middleware' => ['admin_auth']], function() {
        Route::post('/admin/logout', 'AdminLoginController@logout')->name('admin_logout');
    });
});

Route::group(['middleware' => ['auth:web,admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('categories/check_slug', 'CategoryController@check_slug')->name('categories.check_slug');
    Route::get('categories/{slug}/{category}', 'CategoryController@show')->name('categories.show');
    Route::get('tags/check_slug', 'TagController@check_slug')->name('tags.check_slug');
    Route::get('tags/{slug}/{tag}', 'TagController@show')->name('tags.show');
    Route::get('articles/check_slug', 'ArticleController@check_slug')->name('articles.check_slug');
    Route::get('articles/{slug}/{article}', 'ArticleController@show')->name('articles.show');
    Route::get('articles', 'ArticleController@index')->name('articles.index');

    Route::fallback(function () {
        $exception = [];
        return view('errors.404', compact('exception'));
    })->name('404');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['admin_auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Job Positions
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::resource('users', 'UsersController')
        ->except(['store', 'create', 'destroy']);

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // Tags
    Route::delete('tags/destroy', 'TagsController@massDestroy')->name('tags.massDestroy');
    Route::resource('tags', 'TagsController');

    // Articles
    Route::delete('articles/destroy', 'ArticlesController@massDestroy')->name('articles.massDestroy');
    Route::resource('articles', 'ArticlesController');

    Route::get('etc/fresh_users', 'EtcController@showFreshUsersForm')->name('fresh_users.show');
    Route::put('etc/fresh_users', 'EtcController@freshUsers')->name('fresh_users.update');
});
