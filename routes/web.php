<?php


Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

//admin
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('admin-home','HomeController@admin')->name('admin-home');
    Route::get('admin/user-list','AdminController@userList')->name('admin.userList');
    Route::get('admin/user-list/{user}','AdminController@editUser')->name('admin.editUser');
    Route::put('admin/user-list/{user}','AdminController@updateUser')->name('admin.updateUser');
    Route::delete('admin/user-list/{user}', 'AdminController@destory')->name('users.destroy');

    Route::get('admin/post-one-list','AdminController@postOneList')->name('admin.postOneList');
    Route::get('admin/post-two-list','AdminController@postTwoList')->name('admin.postTwoList');
    Route::get('admin/post-three-list','AdminController@postThreeList')->name('admin.postThreeList');
    Route::get('admin/post/create','AdminController@createPost')->name('admin.createPost');
    Route::post('admin/post','AdminController@storePost')->name('admin.admin.storePost');
    Route::get('admin/post/{post}','AdminController@editPost')->name('admin.editPost');
    Route::put('admin/post/{post}','AdminController@updatePost')->name('admin.updatePost');
    Route::delete('admin/posts/{post}', 'AdminController@destory')->name('posts.destroy');
    Route::get('/sample', 'HomeController@sample')->name('sample');
   Route::get('/edit', 'ProfileController@edit')->name('profile.edit');
   Route::post('/change-password', 'ProfileController@changePassword')->name('profile.changePassword');
   Route::post('/change-name', 'ProfileController@changeName')->name('profile.changeName');
   Route::post('/change-email', 'ProfileController@changeEmail')->name('profile.changeEmail');
   Route::post('/change-photo', 'ProfileController@changePhoto')->name('profile.changePhoto');
});

   Route::middleware(['auth'])->group(function(){
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('daily','HomeController@daily')->name('daily');
        Route::get('birthday','HomeController@birthday')->name('birthday');
        Route::get('nearest','HomeController@nearest')->name('nearest');    
   });

