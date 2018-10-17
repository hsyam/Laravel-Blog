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

Route::group(['namespace' => 'User'] , function (){
    Route::get('/', 'HomeController@index');

    Route::get('post' , 'PostController@index')->name('post');
});



Route::group(['namespace' => 'Admin'],function (){

    Route::get('admin/home' , 'HomeController@index' )->name('admin.home');

    // DataTable Route (For generate Json Data used for DataTable Jquery Plugin  )
    Route::get('admin/post/getPostDatatable' , 'PostController@getPostDatatable' )->name('post.getPostDatatable');
    Route::get('admin/post/getPostDatatableTrash' , 'PostController@getPostDatatableTrash' )->name('post.getPostDatatableTrash');

    // Main Resources
    Route::resources([
        'admin/post' => 'PostController',
        'admin/category' => 'CategoryController',
        'admin/tag' => 'TagController',
        'admin/tag' => 'TagController',
        'admin/user' => 'UserController',
    ]);

    // Soft Deleting Routes
    Route::get('admin/post/{id}/softdelete' ,'PostController@softdel')->name('post.softdelete');
    Route::get('admin/post/{id}/restore' ,'PostController@restore')->name('post.restore');


});


//Route::get('admin/post' , function (){
//    return view('admin.post.post');
//});
//
//Route::get('admin/tag' , function (){
//
//});
//
//Route::get('admin/category' , function (){
//    return view('admin.category.category');
//});
