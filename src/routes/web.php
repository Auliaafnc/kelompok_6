<?php
Route::get('/', 'HomewebController@index');
Route::get('/about', 'AboutwebController@index');
Route::get('/menu', 'MenuwebController@index');
Route::get('/order', 'OrderwebController@index');
Route::get('/takeawayform', 'TakeawayformwebController@index')->name('takeawayform');
Route::post('/takeawayform', 'TakeawayformwebController@store')->name('takeaway.store');
Route::get('/takeawaymenu', 'TakeawaymenuwebController@index');
Route::get('/reservation', 'ReservationController@index');
Route::post('/reservation', 'ReservationController@store')->name('reservation.store');
Route::redirect('/loginadmin', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Sosial Media
    Route::delete('sosial-media/destroy', 'SosialMediaController@massDestroy')->name('sosial-media.massDestroy');
    Route::resource('sosial-media', 'SosialMediaController');

    // Footer
    Route::delete('footers/destroy', 'FooterController@massDestroy')->name('footers.massDestroy');
    Route::post('footers/media', 'FooterController@storeMedia')->name('footers.storeMedia');
    Route::post('footers/ckmedia', 'FooterController@storeCKEditorImages')->name('footers.storeCKEditorImages');
    Route::resource('footers', 'FooterController');


    // Takeaway
    Route::delete('takeaways/destroy', 'TakeawayController@massDestroy')->name('takeaways.massDestroy');
    Route::resource('takeaways', 'TakeawayController');

    // About
    Route::delete('abouts/destroy', 'AboutController@massDestroy')->name('abouts.massDestroy');
    Route::post('abouts/media', 'AboutController@storeMedia')->name('abouts.storeMedia');
    Route::post('abouts/ckmedia', 'AboutController@storeCKEditorImages')->name('abouts.storeCKEditorImages');
    Route::resource('abouts', 'AboutController');

    // Order
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::post('orders/media', 'OrderController@storeMedia')->name('orders.storeMedia');
    Route::post('orders/ckmedia', 'OrderController@storeCKEditorImages')->name('orders.storeCKEditorImages');
    Route::resource('orders', 'OrderController');

    // Tim
    Route::delete('tims/destroy', 'TimController@massDestroy')->name('tims.massDestroy');
    Route::post('tims/media', 'TimController@storeMedia')->name('tims.storeMedia');
    Route::post('tims/ckmedia', 'TimController@storeCKEditorImages')->name('tims.storeCKEditorImages');
    Route::resource('tims', 'TimController');

    // Benner
    Route::delete('benners/destroy', 'BennerController@massDestroy')->name('benners.massDestroy');
    Route::post('benners/media', 'BennerController@storeMedia')->name('benners.storeMedia');
    Route::post('benners/ckmedia', 'BennerController@storeCKEditorImages')->name('benners.storeCKEditorImages');
    Route::resource('benners', 'BennerController');

    // Fasilitas
    Route::delete('fasilitas/destroy', 'FasilitasController@massDestroy')->name('fasilitas.massDestroy');
    Route::post('fasilitas/media', 'FasilitasController@storeMedia')->name('fasilitas.storeMedia');
    Route::post('fasilitas/ckmedia', 'FasilitasController@storeCKEditorImages')->name('fasilitas.storeCKEditorImages');
    Route::resource('fasilitas', 'FasilitasController');

    // Tables
    Route::delete('tables/destroy', 'TablesController@massDestroy')->name('tables.massDestroy');
    Route::post('tables/media', 'TablesController@storeMedia')->name('tables.storeMedia');
    Route::post('tables/ckmedia', 'TablesController@storeCKEditorImages')->name('tables.storeCKEditorImages');
    Route::resource('tables', 'TablesController');

    // Reservation
    Route::delete('reservations/destroy', 'ReservationController@massDestroy')->name('reservations.massDestroy');
    Route::resource('reservations', 'ReservationController');

    // Price
    Route::delete('prices/destroy', 'PriceController@massDestroy')->name('prices.massDestroy');
    Route::resource('prices', 'PriceController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
